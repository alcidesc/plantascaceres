<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\CabeceraPedido;


class Lanzadornotificaciones extends Component
{
    public function render(){
    	$contadorproducto = Producto::where('estado',0)->where('tipo',1)->count();
    	$contadorproductosolicitud = CabeceraPedido::where('estado',0)->count();

        return view('livewire.lanzadornotificaciones',[
			"contadorproducto"=>$contadorproducto,
			"contadorproductosolicitud"=>$contadorproductosolicitud
		]);

    }
}
