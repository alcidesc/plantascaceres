<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\Empresa;

class Footer extends Component{

	protected $listeners = ['cartAdded' => 'render','cartDelete' => 'render'];

    public function render()
    {

        $empresa=Empresa::findOrFail(1); 

        return view('livewire.frontend.footer',['empresa'=>$empresa]);
    }

    public function openModal(){
     	$this->emit('show');
 	}

 	public function deletecarrito($id){ 
        Cart::remove([
        	'id' => $id,
        ]);
        $this->emit('alert', ['type' => 'error', 'message' => 'Producto eliminado correctamente.']);
        $this->emit('cartDelete');
    }
}
