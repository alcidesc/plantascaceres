<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class Carritos extends Component{

    public function render(){
        return view('livewire.carritos');
    }

    public function deletecarrito($id){ 

        Cart::remove([
        	
        	'id' => $id,

        ]);
        $this->emit('alert', ['type' => 'error', 'message' => 'Producto eliminado correctamente.']);
        $this->emit('cartDelete');

    }

    public function cantidad($id,$data){ 

        Cart::update($id,[
			'quantity' => $data,
		]);

    }

}
