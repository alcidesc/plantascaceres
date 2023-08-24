<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Compraproductos;

class Preciocompra extends Component{

    public $producto;

    public function render(){

        $compra=Compraproductos::where('producto_id', $this->producto['id'])->orderBy('id','desc')->first();

        return view('livewire.preciocompra',["compra"=>$compra]);
    }
}
