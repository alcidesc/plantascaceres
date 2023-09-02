<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Gastos;
use App\Models\CategoriaGastos;

class AddGasto extends Component
{   
    use WithPagination;

    protected $queryString = ['search' => ['except' => '']];

    protected $paginationTheme = 'bootstrap';
    
    public $search='';
    
    public $nombre, $costos_id, $costo, $categoria_id,$collapsed="collapsed-card",$collapsedicon="fa-plus";
    
    public $updateMode = false;
    
    public function render(){

        $categoriaGasto=CategoriaGastos::find($this->categoria_id);

        $costos = Gastos::where('gastocategoria_id',$this->categoria_id)->where('nombre','LIKE','%'.$this->search.'%')->paginate(20);
        
        return view('livewire.gastos.index',[
            "costos"=>$costos,
            "categoriaGasto"=>$categoriaGasto
        ]);

    }
    
    private function resetInputFields(){
        $this->nombre = '';
        $this->costo = '';

    }

   public function store()
    {
        $validatedDate = $this->validate([
            'nombre' => 'required',
            'costo' => 'required',
        ]);


        Gastos::create([
            'nombre' => $this->nombre, 
            'costo' => $this->costo,
            'gastocategoria_id' => $this->categoria_id,
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Gasto agregado correctamente!']);

        $this->resetInputFields();

    }
    public function edit($id){
        
        $this->updateMode = true;
        $gastos = Gastos::find($id);
        $this->nombre = $gastos->nombre;
        $this->costo = $gastos->costo; 
        $this->collapsed="";
        $this->collapsedicon="fa-minus";     
 
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        $this->collapsed="collapsed-card";
        $this->collapsedicon="fa-plus";
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'nombre' => 'required',
            'costo' => 'required',
        ]);

        if ($this->costos_id) {
            $gastos = Gastos::find($this->costos_id);
            $gastos->update([
                'nombre' => $this->nombre,
                'costo' => $this->costo,

            ]);
            $this->updateMode = false;
            $this->emit('alert', ['type' => 'success', 'message' => 'Costo actualizado correctamente!']);
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            $costos = Gastos::find($id);
            $costos->delete();
            $this->emit('alert', ['type' => 'error', 'message' => 'Gasto eliminado correctamente!']);
        }
    }

    public function collapsed(){
        if($this->collapsed){
            $this->collapsed="";
            $this->collapsedicon="fa-minus";
        }else{
            $this->collapsed="collapsed-card";
            $this->collapsedicon="fa-plus";
        }
    }
}
