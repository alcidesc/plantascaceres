<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use DB;

class Infoproductos extends Component{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search='';

    public function render(){

        $mas_vendidos = DB::select("
                SELECT v.producto_id, SUM(v.cantidad) AS TotalVentas 
                FROM facturacionproductos as v 
                JOIN productos as a 
                WHERE a.id = v.producto_id
                GROUP BY v.producto_id 
                ORDER BY SUM(v.cantidad) DESC 
                LIMIT 0 , 5");

        $mas_comprados = DB::select('
                SELECT d.producto_id, SUM(d.cantidad) AS TotalCompras 
                FROM compraproductos as d 
                JOIN productos as a 
                WHERE a.id = d.producto_id 
                GROUP BY d.producto_id 
                ORDER BY SUM(d.cantidad) DESC 
                LIMIT 0 , 5');
        
        $mas_vendidos_nombre=[];
        $mas_vendidos_cantidad=[];
        
        foreach($mas_vendidos as $ven){
            $producto = Producto::find($ven->producto_id);
            $mas_vendidos_nombre[]=$producto->nombre;
            $mas_vendidos_cantidad[]=$ven->TotalVentas;
        }

        $mas_comprados_nombre=[];
        $mas_comprados_cantidad=[];
        
        foreach($mas_comprados as $com){
            $producto = Producto::find($com->producto_id);
            $mas_comprados_nombre[]=$producto->nombre;
            $mas_comprados_cantidad[]=$com->TotalCompras;
        }

        $mas_comprados = DB::select('
                SELECT d.producto_id, SUM(d.cantidad) AS TotalCompras 
                FROM compraproductos as d 
                JOIN productos as a 
                WHERE a.id = d.producto_id 
                GROUP BY d.producto_id 
                ORDER BY SUM(d.cantidad) DESC 
                LIMIT 0 , 5');

                $productos = Producto::where('estado',1)->where('tipo',1)->where('nombre','LIKE','%'.$this->search.'%')->orwhere('codigo','LIKE','%'.$this->search.'%')->orderBy('stock','asc')->paginate(30);

        return view('livewire.infoproductos',[
            "productos"=>$productos,
            "mas_vendidos_nombre"=>json_encode($mas_vendidos_nombre,JSON_NUMERIC_CHECK),
            "mas_vendidos_cantidad"=>json_encode($mas_vendidos_cantidad,JSON_NUMERIC_CHECK),
            "mas_comprados_nombre"=>json_encode($mas_comprados_nombre,JSON_NUMERIC_CHECK),
            "mas_comprados_cantidad"=>json_encode($mas_comprados_cantidad,JSON_NUMERIC_CHECK),
        ]);
    }
}
