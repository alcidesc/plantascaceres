<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Facturacionencabezado;
use App\Models\Facturacionproducto;
use App\Models\Producto;
use App\Models\User;
use App\Models\Empresa;
use Carbon\Carbon;
use DB;
use PDF;

class Listafacturas extends Component{
	
	use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';

    public $comprobante,$productos,$vendedor,$cliente,$fechainicio,$fechafin;

    public function render(){

        $empresa=Empresa::findOrFail(1); 

        if($this->fechainicio && $this->fechafin){
            $encabezado = DB::table('facturacionencabezados as f')
            ->join('users as u','f.cliente_id','u.id')
            ->join('users as us','f.vendedor_id','us.id')
            ->select('f.*','u.name','us.name as vendedor')
            ->where('f.estado',1)
            ->whereDate('f.created_at','>=',Carbon::parse($this->fechainicio)->toDateString())
            ->whereDate('f.created_at','<=',Carbon::parse($this->fechafin)->toDateString())
            ->orderBy('f.id','desc')->paginate(20);
        }else{
            $encabezado = DB::table('facturacionencabezados as f')
    		->join('users as u','f.cliente_id','u.id')
            ->join('users as us','f.vendedor_id','us.id')
    		->select('f.*','u.name','us.name as vendedor')
            ->where('f.tipocomprobantes',"Factura")->orderBy('f.id','desc')->paginate(20);
        }
        return view('livewire.listafacturas',["encabezado"=>$encabezado,"empresa"=>$empresa]);
        
    }

    public function leer($id){

        $this->comprobante = Facturacionencabezado::find($id);

        $this->vendedor=User::find($this->comprobante->vendedor_id);
        $this->cliente=User::find($this->comprobante->cliente_id);

        $this->productos=DB::table('facturacionproductos as f')
            ->join('productos as p','f.producto_id','p.id')
            ->select('f.*','p.nombre')
            ->where('encabezado_id',$id)->get();
    }

}
