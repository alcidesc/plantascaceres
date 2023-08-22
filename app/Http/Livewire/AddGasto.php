<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Gastos;

class AddGasto extends Component
{   
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';
    
    public $nombre, $costos_id, $costo, $categoria_id;
    
    public $updateMode = false;
    
    public function render(){

        $costos = Gastos::where('gastocategoria_id',$this->categoria_id)->where('nombre','LIKE','%'.$this->search.'%')->paginate(20);
        
        return view('livewire.gastos.index',["costos"=>$costos]);

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
    public function edit($id)
    {
        $this->updateMode = true;
        $gastos = Gastos::where('id',$id)->first();
        $this->nombre = $gastos->nombre;
        $this->costo = $gastos->costo;    
 
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
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
}
