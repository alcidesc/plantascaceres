<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\CategoriaProducto;
use Livewire\WithFileUploads;
use Image, file;
use DB;

class Productos extends Component{

    use WithPagination;
    use WithFileUploads;

    protected $queryString = ['search' => ['except' => '']];
    protected $paginationTheme = 'bootstrap';
    public $search='';
    public $nombre,$producto_id,$descripcion,$slug,$codigo,$precio2,$precio3,$iva=10,
        $precio,$stock,$oferta,$foto,$fotoupdate,$categorias_id;
    public $collapsed="collapsed-card",$collapsedicon="fa-plus";
    public $updateMode = false,$fila="id",$orden="desc";

    public function render(){

        $productos = Producto::where('estado',1)->where('tipo',1)
            ->where('nombre','LIKE','%'.$this->search.'%')
            ->orderBy($this->fila,$this->orden)->paginate(15);
        $categorias = Categoria::where('estado',1)->get();
        $listcategorias = DB::table('categoria_productos as cp')
            ->join('categorias as c','cp.categoria_id','c.id')
            ->select('c.*')
            ->where('cp.producto_id', $this->producto_id)->where('c.estado',1)->get();

        return view('livewire.productos.index',[
            'productos'=>$productos,
            'categorias'=>$categorias,
            'listcategorias'=>$listcategorias
        ]);
    }

    private function resetInputFields(){
        $this->nombre = '';
        $this->producto_id = '';
        $this->descripcion = '';
        $this->emit('descripcion','');
        $this->slug = '';
        $this->codigo = '';
        $this->precio = '';
        $this->emit('precio','');
        $this->precio2 = '';
        $this->emit('precio2','');
        $this->precio3 = '';
        $this->emit('precio3','');
        $this->stock = '';
        $this->emit('stock','');
        $this->oferta = '';
        $this->emit('oferta','');
        $this->iva = '';
        $this->foto = '';
        $this->categorias_id = '';
        $this->emit('categorias_id','');
    }

   public function store()
{
    $validatedData = $this->validate([
        'nombre' => ['required', 'unique:productos'],
        'slug' => ['required', 'unique:productos'],
        'codigo' => ['required', 'unique:productos'],
        'precio' => 'required',
        'stock' => 'required',
        'categorias_id' => 'required',
    ],
    [
        'nombre.unique' => 'El nombre de producto ya está en uso',
        'slug.unique' => 'El enlace ya está en uso',
        'codigo.unique' => 'El código ya está en uso',
    ]);

    $nombreFoto = '';
    if ($file = $this->foto) {
        $control = 0;
        $nombreFoto = rand() . "." . $file->getClientOriginalExtension();
        while ($control == 0) {
            if (is_file(public_path() . '/images/productos/' . $nombreFoto)) {
                $nombreFoto = rand() . $nombreFoto;
            } else {
                Image::make($this->foto)
                    ->heighten(1000)
                    ->save(public_path() . '/images/productos/' . $nombreFoto);
                $control = 1;
            }
        }
    }

    $producto = new Producto;
    $producto->nombre = $this->nombre;
    $producto->descripcion = $this->descripcion;
    $producto->slug = $this->slug;
    $producto->codigo = $this->codigo;
    $producto->precio = intval(str_replace(".", "", $this->precio));
    $producto->precio2 = intval(str_replace(".", "", $this->precio2));
    $producto->precio3 = intval(str_replace(".", "", $this->precio3));
    $producto->stock = $this->stock;
    $producto->oferta = intval(str_replace(".", "", $this->oferta));
    $producto->iva = intval($this->iva);
    $producto->estado = 1;
    $producto->foto = $nombreFoto;
    $producto->tipo = 1;
    $producto->save();

    // Crear el producto y guardar sus categorías relacionadas
    foreach($this->categorias_id as $cat){
        CategoriaProducto::create([
            'categoria_id' => $cat,
            'producto_id' => $producto->id,
        ]);
    }

    $this->emit('alert', ['type' => 'success', 'message' => '¡Producto agregado correctamente!']);
    $this->resetInputFields();
    $this->collapsed = "collapsed-card";
    $this->collapsedicon = "fa-plus";
}


    public function edit($id)
    {
        $this->updateMode = true;
        $producto = Producto::where('id', $id)->first();
        $categorias = CategoriaProducto::where('producto_id', $id)->select('categoria_id')->get();
        $this->nombre = $producto->nombre;
        $this->producto_id = $producto->id;
        $this->slug = $producto->slug;
        $this->codigo = $producto->codigo;
        $this->precio = $producto->precio;
        $this->emit('precio', intval(str_replace(".", "", $producto->precio)));
        $this->precio2 = $producto->precio2;
        $this->emit('precio2', intval(str_replace(".", "", $producto->precio2)));
        $this->precio3 = $producto->precio3;
        $this->emit('precio3', intval(str_replace(".", "", $producto->precio3)));
        $this->stock = $producto->stock;
        $this->emit('stock', intval(str_replace(".", "", $producto->stock)));
        $this->oferta = $producto->oferta;
        $this->emit('oferta', intval(str_replace(".", "", $producto->oferta)));
        $this->iva = $producto->iva;
        $this->foto = $producto->foto;
        $this->emit('categorias_id', $categorias);
        $this->descripcion = $producto->descripcion;
        $this->emit('descripcion', $producto->descripcion);
    
        $this->collapsed = "";
        $this->collapsedicon = "fa-minus";      
    }
    
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        $this->collapsed="collapsed-card";
        $this->collapsedicon="fa-plus";
    }

    public function update(){
        $validatedDate = $this->validate([
            'nombre' => 'required|unique:productos,nombre,'.$this->producto_id,
            'slug' => 'required|unique:productos,slug,'.$this->producto_id,
            'codigo' => 'required|unique:productos,codigo,'.$this->producto_id,
            'precio' => 'required',
            'stock' => 'required',
            'categorias_id' => 'required',
        ],
        [ 
            'nombre.unique' => 'El nombre de producto ya esta en uso',
            'slug.unique' => 'El enlace ya esta en uso',
            'codigo.unique' => 'El código ya esta en uso',
        ]); 

        if($this->producto_id){
            $nombre='';
            if($file = $this->fotoupdate) {
                $control=0;
                $nombre = rand().".".$file->getClientOriginalExtension();
                while ($control == 0) {
                    if (is_file( public_path() . '/images/productos/' . $nombre )) {
                        $nombre = rand() . $nombre;
                    }else{
                        Image::make($this->fotoupdate)
                            ->heighten(1000)
                            ->save(public_path() . '/images/productos/' . $nombre);
                        $control=1;
                    }
                }
            }

                $producto = Producto::find($this->producto_id);
                $producto->nombre = $this->nombre;
                $producto->descripcion = $this->descripcion;
                $producto->slug = $this->slug;
                $producto->codigo = $this->codigo;
                $producto->descripcion = $this->descripcion;
                $producto->precio = intval(str_replace(".", "", $this->precio));
                $producto->precio2 = intval(str_replace(".", "", $this->precio2));
                $producto->precio3 = intval(str_replace(".", "", $this->precio3));
                $producto->stock = $this->stock;
                $producto->oferta = $this->oferta;
                $producto->iva = intval(str_replace(".", "", $this->iva));
                if ($nombre) {
                    $producto->foto = $nombre;
                }

            $producto->save();

            $categorias=CategoriaProducto::where('producto_id',$this->producto_id)->get();
            
            foreach($categorias as $categoria){
                $eliminar=CategoriaProducto::find($categoria->id);
                $eliminar->delete();
            }

            foreach($this->categorias_id as $cat){
                CategoriaProducto::create([
                    'categoria_id' => $cat,
                    'producto_id' => $producto->id,
                ]);
            }

            $this->emit('alert', ['type' => 'success', 'message' => 'Producto editado correctamente!']);
            $this->resetInputFields();
            $this->collapsed="collapsed-card";
            $this->collapsedicon="fa-plus";
            $this->updateMode = false;
        }
    }

    public function delete($producto_id){
        $producto = Producto::find($producto_id);
            $producto->estado=0;
        $producto->update();
        $this->emit('alert', ['type' => 'error', 'message' => 'Producto eliminado correctamente!']);
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

    public function ordenar($fila){
        if($fila == $this->fila){
            if($this->orden == "asc"){
                $this->orden="desc";
            }else{
                $this->orden="asc";
            }
        }else{
            $this->fila=$fila;
            $this->orden="asc";
        }
    }
}
