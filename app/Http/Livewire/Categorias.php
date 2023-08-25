<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categoria;

class Categorias extends Component{

    use WithPagination;

    protected $queryString = ['search' => ['except' => '']];

    protected $paginationTheme = 'bootstrap';
    
    public $search='';
    
    public $nombre, $categoria_id,$collapsed="collapsed-card",$collapsedicon="fa-plus";
    
    public $updateMode = false;
    
    public function render(){

        $categorias = Categoria::where('estado',1)->where('nombre','LIKE','%'.$this->search.'%')->paginate(20);
        
        return view('livewire.categoria.index',["categorias"=>$categorias]);

    }
    
    private function resetInputFields(){
        $this->nombre = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nombre' => 'required'
        ]);

        Categoria::create($validatedDate);

        $this->emit('alert', ['type' => 'success', 'message' => 'Categoria agregada correctamente!']);

        $this->resetInputFields();

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $categoria = Categoria::where('id',$id)->first();
        $this->nombre = $categoria->nombre;
        $this->categoria_id = $categoria->id; 
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

        ]);

        if ($this->categoria_id) {
            $categoria = Categoria::find($this->categoria_id);
            $categoria->update([
                'nombre' => $this->nombre,

            ]);
            $this->updateMode = false;
            $this->emit('alert', ['type' => 'success', 'message' => 'Categoria actualizada correctamente!']);
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            $categoria = Categoria::find($id);
            $categoria->estado=0;
            $categoria->update();
            $this->emit('alert', ['type' => 'error', 'message' => 'Categoria eliminada correctamente!']);
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
