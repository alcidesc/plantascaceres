<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CabeceraPedido;
use App\Models\Empresa;
use DB;
use Carbon\Carbon;

class Productorecepcion extends Component{

	 use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';

	public $pedidoestado=0;

	public $LeerMode = false;

	public $usuario_id,$cabecera_id=0;

    public $msmstate,$dia,$hora;

    public function render(){ 

        $empresa = Empresa::findorFail(1);

    	if ($this->pedidoestado == 0) {
            $producto=DB::table('cabecera_pedidos as ca')
                ->join('users as u','ca.usuario_id','u.id')
                ->select('ca.*','u.name','u.contacto')
                ->where('ca.estado',0)
                ->where('u.name','LIKE','%'.$this->search.'%')
                ->paginate(10);

    	}elseif ($this->pedidoestado == 1) {
    		$producto=DB::table('cabecera_pedidos as ca')
                ->join('users as u','ca.usuario_id','u.id')
                ->select('ca.*','u.name','u.contacto')
                ->where('ca.estado',1)
                ->where('u.name','LIKE','%'.$this->search.'%')
                ->paginate(10);
    	}else{
    		$producto=DB::table('cabecera_pedidos as ca')
                ->join('users as u','ca.usuario_id','u.id')
                ->select('ca.*','u.name','u.contacto')
                ->where('ca.estado',2)
                ->where('u.name','LIKE','%'.$this->search.'%')
                ->paginate(10);
    	}

        $contadorproducto = CabeceraPedido::where('estado',0)->count();
        $contadorproductoprocesando = CabeceraPedido::where('estado',1)->count();

        if ($this->cabecera_id != 0) {
            $cabecera = DB::table('cabecera_pedidos as ca')
                ->join('users as u','ca.usuario_id','u.id')
                ->select('ca.*','u.name','u.contacto')
                ->where('ca.id',$this->cabecera_id)->first();
   
            $productos = DB::table('pedidos as cp')
                ->join('productos as p','cp.producto_id','p.id')
                ->select('cp.*','p.nombre','p.foto')
                ->where('cp.cabecera_id',$this->cabecera_id)
                ->get();

            return view('livewire.productosrecepcion.productosrecepcion',["producto"=>$producto,"contadorproductoprocesando"=>$contadorproductoprocesando,"cabecera"=>$cabecera,"productos"=>$productos,"contadorproducto"=>$contadorproducto,"empresa"=>$empresa]);
        }else{
            return view('livewire.productosrecepcion.productosrecepcion',["producto"=>$producto,"contadorproductoprocesando"=>$contadorproductoprocesando,"contadorproducto"=>$contadorproducto,"empresa"=>$empresa]);
        }
    
    }

    public function estado($estado){
    	$this->pedidoestado=$estado;
        $this->cabecera_id=0;
        $this->LeerMode = false;
        $this->msmstate = $estado;

    }

    public function leer($id){
    	$this->LeerMode = true;
        $this->cabecera_id=$id;
        $cabecera = DB::table('cabecera_pedidos as ca')
            ->join('users as u','ca.usuario_id','u.id')
            ->select('ca.*','u.name','u.contacto')
            ->where('ca.id',$id)->first();
    }
    
    public function procesando($id){

        $pedido = CabeceraPedido::find($id);
            $pedido->estado=1;
        $pedido->update();
        $this->LeerMode = false;

    }

    public function entregado($id){

        $pedido = CabeceraPedido::find($id);
            $pedido->estado=2;
        $pedido->update();
        $this->LeerMode = false;

    }

    public function openModal(){
        $this->emit('show');
    }
}