<?php
namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CabeceraPedido;
use DB;
use Carbon\Carbon;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;

class Verproductos extends Component{

    protected $paginationTheme = 'bootstrap';

	public $usuario_id,$cabecera_id=0;

    public $productos;

    public function render(){    

    	
        $cabecera=CabeceraPedido::where('usuario_id',Auth::user()->id)->paginate('20');

        return view('livewire.verproductos',["cabecera"=>$cabecera]);
    }
    
    public function leer($id){
    	
        $this->productos = DB::table('pedidos as pe')
            ->join('productos as p','pe.producto_id','p.id')
            ->select('pe.*','p.nombre')
            ->where('pe.cabecera_id',$id)->get();
    
    }

    public function openModal(){
        $this->emit('show');
    }
}