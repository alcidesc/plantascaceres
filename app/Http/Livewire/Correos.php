<?php

namespace App\Http\Livewire; 

use Livewire\Component; 
use Livewire\WithPagination;
use App\Models\Mensaje;


class Correos extends Component{

	 use WithPagination; 

    protected $paginationTheme = 'bootstrap';
    
    public $search='';

	public $mensajeestado=0;

	public $LeerMode = false;

	public $nombre,$update_at,$mensaje,$celular,$mensaje_id,$msmstate;

    public function render(){

    	if ($this->mensajeestado == 0) {
    		$contacto = Mensaje::where('estado',0)->where('nombre','LIKE','%'.$this->search.'%')->paginate(10);
    	}elseif ($this->mensajeestado == 1) {
    		$contacto = Mensaje::where('estado',1)->where('nombre','LIKE','%'.$this->search.'%')->paginate(10);
    	}else{
    		$contacto = Mensaje::where('estado',2)->where('nombre','LIKE','%'.$this->search.'%')->paginate(10);
    	}

    	$contador = Mensaje::where('estado',0)->count();

        return view('livewire.correosadmin.correos',["contacto"=>$contacto,"contador"=>$contador]); 
    
    }

    public function estado($estado){
    	$this->mensajeestado=$estado;
        $this->LeerMode = false;
    }

    public function leer($id){
    	$this->LeerMode = true;

    	$mensaje = Mensaje::find($id);
        
            $this->nombre = $mensaje->nombre;
            $this->update_at = $mensaje->update_at;
            $this->mensaje = $mensaje->mensaje;
            $this->celular = $mensaje->celular;
            $this->mensaje_id = $mensaje->id;
            $this->msmstate = $mensaje->estado;

        if ($mensaje->estado == 0) {
            $mensaje->estado=1;
            $mensaje->update();
        }
    }
    public function delete($id){

        $mensaje = Mensaje::find($id);
        $mensaje->estado=2;
        $mensaje->update();
        $this->LeerMode = false;

    }
       
}
