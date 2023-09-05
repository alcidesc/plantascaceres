<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cabeceracompra; 
use App\Models\Producto; 
use App\Models\Compraproductos;
use App\Models\Proveedor; 
use DB;
use Auth;

class Compras extends Component{

    protected $paginationTheme = 'bootstrap';
    use WithPagination;
    public $search='';
    
    public $updateMode = 0;

    public $proveedor_id,$nfactura,$selectpro,$cabecera_id,$banco,$fechaPago,$numeroBoletas,$numeroTarjeta;
    public $TipoPago = 'Efectivo';public $tipoCompra;

    public $prod_cargados=[];
    
    public function render(){

        $productos=Producto::where('estado',1)->get();
        $proveedores=Proveedor::where('estado',1)->get();

        $encabezado=DB::table('cabeceracompras as cc')
            ->join('users as u','cc.usuario_id','u.id')
            ->join('proveedors as p','cc.proveedor_id','p.id')
            ->select('cc.*','u.name','p.nombre as proveedor')
            ->where('p.nombre','LIKE','%'.$this->search.'%')->paginate(20);

        $cabecera=DB::table('cabeceracompras as cc')
            ->join('proveedors as p','cc.proveedor_id','p.id')
            ->join('users as u','cc.usuario_id','u.id')
            ->select('cc.*','p.nombre as proveedor','u.name as comprador')
            ->where('cc.id',$this->cabecera_id)->first();

        $cabeceraproductos=DB::table('compraproductos as cp')
            ->join('productos as p','cp.producto_id','p.id')
            ->select('cp.*','p.nombre','p.codigo')
            ->where('cp.cabecera_id',$this->cabecera_id)->get();
        
        return view('livewire.compras.index',["cabecera"=>$cabecera,"cabeceraproductos"=>$cabeceraproductos,"encabezado"=>$encabezado,"productos"=>$productos,"proveedores"=>$proveedores]);
    }
    
    private function resetInputFields(){
        
        $this->proveedor_id = '';
        $this->nfactura = '';
        $this->selectpro = '';
        $this->prod_cargados=[];

    }

    public function crear(){
        $this->updateMode = 1;
    }

    public function store(){
        $validatedDate = $this->validate([
            'proveedor_id' => 'required',
            'nfactura' => 'required',
        ]);
    
        $cabecera = new Cabeceracompra;
        $cabecera->tipoCompra = $this->tipoCompra == 2 ? $this->tipoCompra : 1; // Usar el valor del selector
        $cabecera->nfactura = $this->nfactura;
        $cabecera->proveedor_id = $this->proveedor_id;
        $cabecera->usuario_id = Auth::user()->id;
        $cabecera->TipoPago = $this->TipoPago;
        $cabecera->banco = $this->banco;
        $cabecera->numeroTarjeta = $this->numeroTarjeta;
        $cabecera->fechaPago  = $this->fechaPago;
        $cabecera->numeroBoletas = $this->numeroBoletas ;

        if($cabecera->save()){
            foreach($this->prod_cargados as $index => $prod) {
                $producto = new Compraproductos;
                $producto->producto_id = $prod['id'];
                $producto->cantidad = $prod['cantidad'];
                $producto->precio =  $prod['precio'];
                $producto->cabecera_id = $cabecera->id;
                
                
                if($producto->save()){ 
                    $incremento = Producto::find($prod['id']);
                    $incremento->stock += $prod['cantidad'];
                    $incremento->update();
                }
            }
        }
    
        $this->emit('alert', ['type' => 'success', 'message' => 'Compra realizada correctamente!']);
    
        $this->resetInputFields();
        $this->updateMode = 0;
    }
    

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function delete($id)
    {
        if($id){
            $productos=Compraproductos::where('cabecera_id',$id)->get();
            foreach($productos as $prod){
                $producto=Producto::find($prod->producto_id);
                    $producto->stock-=$prod->cantidad;
                $producto->update();
            }

            $cabecera = Cabeceracompra::find($id);
                $cabecera->estado=0;
            $cabecera->update();
            
            $this->emit('alert', ['type' => 'error', 'message' => 'Compra anulada correctamente!']);
        }
    }

    public function changeEvent(){
        $producto = Producto::where('codigo', $this->selectpro)->first();
        
        if (array_key_exists($producto->id, $this->prod_cargados)){
            $this->prod_cargados[$producto->id]['cantidad'] += 1;
        } else {
            $this->prod_cargados[$producto->id]['id'] = $producto->id;
            $this->prod_cargados[$producto->id]['codigo'] = $producto->codigo;
            $this->prod_cargados[$producto->id]['nombre'] = $producto->nombre;
            $this->prod_cargados[$producto->id]['cantidad'] = 1;
            $this->prod_cargados[$producto->id]['precio'] = 0;
    
            // Agregar los nuevos campos
            $this->prod_cargados[$producto->id]['TipoPago'] = ''; // Tipo de pago
            $this->prod_cargados[$producto->id]['banco'] = ''; // Banco
            $this->prod_cargados[$producto->id]['numeroTarjeta'] = ''; // Numero de tarjeta
            $this->prod_cargados[$producto->id]['fechaPago'] = ''; // Fecha de pago
            $this->prod_cargados[$producto->id]['numeroBoletas'] = ''; // Numero de boletas
        }
    
        $this->selectpro = "";
    }
    

    public function deleteitem($id){
        unset($this->prod_cargados[$id]);
    }

    public function changecantidad($cantidad,$id){
        $this->prod_cargados[$id]['cantidad']=$cantidad;
    }

    public function changeprecio($precio,$id){
        $this->prod_cargados[$id]['precio']=$precio;
    }

    public function leer($id){
        $this->cabecera_id=$id;
        
        $this->updateMode = 2;
    }
}

