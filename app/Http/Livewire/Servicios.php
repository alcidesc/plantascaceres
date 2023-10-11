<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;

class Servicios extends Component{

	use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search='';


    public function render(){

    	$servicios = Producto::where('estado',1)->where('tipo',2)->where('nombre','LIKE','%'.$this->search.'%')->paginate(20);


        $contadorservicios = Producto::where('estado',0)->where('tipo',2)->count();

        return view('livewire.servicios',["servicios"=>$servicios,"contadorservicios"=>$contadorservicios]);
    }

    public function delete($id)
    {
        if($id){
            $servicio = Producto::find($id);
            $servicio->estado=0;
            $servicio->update();
            session()->flash('message', 'Servicio eliminado correctamente');
        }
}
}
