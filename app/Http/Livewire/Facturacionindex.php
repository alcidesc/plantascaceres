<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Facturacionencabezado;
use App\Models\Facturacionproducto;
use App\Models\Producto;
use App\Models\User;
use App\Models\Empresa;
use DB;

class Facturacionindex extends Component{
	
	use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';

    public $comprobante,$productos,$vendedor,$cliente;

    public function render(){

        $empresa=Empresa::findOrFail(1); 

    	$encabezado = DB::table('facturacionencabezados as f')
    		->join('users as u','f.cliente_id','u.id')
            ->join('users as us','f.vendedor_id','us.id')
    		->select('f.*','u.name','us.name as vendedor')
    		->where('u.name','LIKE','%'.$this->search.'%')->orderBy('id','desc')->paginate(20);

        return view('livewire.facturacion.facturacionindex',["encabezado"=>$encabezado,"empresa"=>$empresa]);
        
    }

    public function delete($id){
        if($id){
            $cabecera = Facturacionencabezado::find($id);
            $cabecera->estado=0;
            $cabecera->update();

            $compras=Facturacionproducto::where('encabezado_id',$id)->get();

            foreach ($compras as $value) {
                $producto = Producto::find($value->producto_id);
                $producto->stock+=$value->cantidad;
                $producto->update();
            }

            session()->flash('message', 'Facturación anulada correctamente');
        }
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
