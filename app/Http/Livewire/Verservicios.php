<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CabeceraCita;
use Illuminate\Support\Facades\Auth;
use DB;

class Verservicios extends Component{

	protected $paginationTheme = 'bootstrap';

	public $usuario_id,$cabecera_id=0;

    public $servicios;

    public function render(){    


        $cabecera=CabeceraCita::where('usuario_id',Auth::user()->id)->paginate('20');

        return view('livewire.verservicios',["cabecera"=>$cabecera]);
    }
    
    public function leer($id){
    	
        $this->servicios = DB::table('servicio_citas as se')
            ->join('servicios as s','se.servicio_id','s.id')
            ->select('se.*','s.nombre')
            ->where('se.cabecera_id',$id)->get();
    
    }

}
