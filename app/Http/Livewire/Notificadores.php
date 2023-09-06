<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\notificacion;
use Auth;


class Notificadores extends Component{
    
    public function render(){
            $notificacion=notificacion::where('estado',0)->get();
        return view('livewire.notificadores',["notificacion"=>$notificacion]);
    }

    public function leido($id){

        $notificacion = notificacion::find($id);
        $notificacion->estado=1;
        $notificacion->update();

        return redirect()->to($notificacion->enlace);
    }
    
}
