<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empresa;

class Info extends Component{

	protected $listeners = ['cartAdded' => 'render','cartDelete' => 'render'];

    public function render(){

    	$empresa=Empresa::findOrFail(1); 

        return view('livewire.frontend.info',["empresa"=>$empresa]);

    }
}
