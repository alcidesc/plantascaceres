<?php

namespace App\Http\Livewire;
use App\Models\Producto;
use App\Models\CategoriaProducto;
use App\Models\Visita;
use Cart;
use DB;
use Auth;

use Livewire\Component;

class View extends Component{

    public $slug;
    protected $listeners = ['cartDelete' => 'render'];

    public function mount() {
        $producto = Producto::where('slug',$this->slug)->first();
        if(Auth::guest()){
            $vista=new Visita;
                $vista->producto_id = $producto->id;
            $vista->save();
        }else{
            $vista=new Visita;
                $vista->producto_id = $producto->id;
                $vista->usuario_id = Auth::user()->id;
            $vista->save();
        }
    }

    public function render(){

        $producto = Producto::where('slug',$this->slug)->first();
        $categorias = CategoriaProducto::where('producto_id',$producto->id)->get();
        $categorias_id=[];
        foreach($categorias as $cat){
            $categorias_id[]=$cat->categoria_id;
        }
        $productos=DB::table('productos as p')
            ->join('categoria_productos as cp','cp.producto_id','p.id')
            ->where('p.id','!=',$producto->id)
            ->whereIn('cp.categoria_id', $categorias_id)
            ->orderBy('p.id','desc')->limit(6)->get();

        return view('livewire.frontend.view',["producto"=>$producto,"productos"=>$productos]);
    }

    public function addcarrito($id){
        $producto = Producto::find($id);  
        if ($producto->oferta) {
         	$precio = $producto->oferta;
        }else{
         	$precio = $producto->precio;
        }
        Cart::add(
        	$id,
        	$producto->nombre,
        	$precio,
        	1,
        	array("urlfoto"=>$producto->foto,"tipo"=>"producto"),
        );
        $this->emit('alert', ['type' => 'success', 'message' => 'Producto agregado correctamente.']);
        $this->emit('cartAdded'); 
    }

    public function deletecarrito($id){ 
        Cart::remove([
        	'id' => $id,
        ]);
        $this->emit('alert', ['type' => 'error', 'message' => 'Producto eliminado correctamente.']);
        $this->emit('cartDelete');
    }
}
