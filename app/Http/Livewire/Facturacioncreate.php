<?php

namespace App\Http\Livewire; 

use Livewire\Component;
use App\Models\User;
use App\Models\Facturacionencabezado;
use App\Models\Facturacionproducto;
use App\Models\Producto;
use App\Models\Empresa;
use Illuminate\Support\Facades\Hash;
use Auth;
use Redirect;
use Session;

class Facturacioncreate extends Component{

	public $cliente_id,$descuento=0,$name,$email,$ci,$selectpro,$credito,$tipocomprobantes="Recibo",
    $producto_id,$efectivo,$nrofactura,$timbrado,$iniciovigencia,$finvigencia,$codigo1,$codigo2,$precioSeleccionado;

    public $prod_cargados=[];
    public $tipoPago = 'Efectivo';
    public $banco,$numeroTarjeta,$fechaCobro,$numeroBoleta;
    public $tipoVenta = 1;


    public function mount(){
        $empresa=Empresa::first();

        $this->nrofactura=$empresa->nro_factura;
        $this->timbrado=$empresa->timbrado;
        $this->iniciovigencia=$empresa->iniciovigencia;
        $this->finvigencia=$empresa->finvigencia;
        $this->codigo1=$empresa->codigo1;
        $this->codigo2=$empresa->codigo2;

    }

    public function render(){

    	$productos=Producto::where('estado',1)->where('stock','>',1)->get();
    	$clientes=User::where('estado',1)->get();
        
        
        return view('livewire.facturacion.facturacioncreate',[
            "clientes"=>$clientes,
            "productos"=>$productos
        ]);
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->ci = '';
        $this->prod_cargados=[];
    }

    public function store(){

        $validatedDate = $this->validate([
            'name' => 'required|max:255',
            'ci' => 'required',
            'nrofactura' => 'required',
            'timbrado' => 'required',
            'iniciovigencia' => 'required',
            'finvigencia' => 'required',
            
        ],
        [
            'name.required' => 'El campo nombre no puede estar vacio',

            'ci.required' => 'El campo RUC/CI no puede estar vacio',
        ]
        );

        $usuario=new User;

        $usuario->name = $this->name;
        $usuario->email = rand()."@".rand().".".rand();
        $usuario->password = Hash::make('cambiame123');
        $usuario->ci = $this->ci;
        $usuario->nivel = 3;

        $usuario->save();

        $this->emit('usuario', $usuario);

        $this->cliente_id = $usuario->id;

        $this->resetInputFields();

    }

   

    public function facturacion(){

        $validatedDate = $this->validate([
            'cliente_id' => 'required',
            'tipocomprobantes' => 'required',
            'prod_cargados' => 'required',
        ]);
        
        $encabezado = new Facturacionencabezado;

        $encabezado->cliente_id = $this->cliente_id;
        $encabezado->estado = $this->tipoVenta == 2 ? $this->tipoVenta : 1; // Usar el valor del selector
        $encabezado->vendedor_id = Auth::user()->id;
        // $encabezado->descuento = $this->descuento;
        $encabezado->tipocomprobantes = $this->tipocomprobantes; 
        
        if ($this->tipocomprobantes == "Factura") {
            $encabezado->timbrado = $this->timbrado;
            $encabezado->iniciovigencia = $this->iniciovigencia;
            $encabezado->nrofactura = $this->nrofactura;
            $encabezado->finvigencia = $this->finvigencia;
            $encabezado->codigo1 = $this->codigo1;
            $encabezado->codigo2 = $this->codigo2;    
        }
        
        $encabezado->tipoPago = $this->tipoPago;
        $encabezado->banco = $this->banco;
        $encabezado->numeroTarjeta = $this->numeroTarjeta;
        $encabezado->fechaCobro = $this->fechaCobro;
        $encabezado->numeroBoleta = $this->numeroBoleta;
        
        $total = 0; 
        

        if ($encabezado->save()){

        	foreach($this->prod_cargados as $prod){

                $cargaproducto=new Facturacionproducto;

		    	$cargaproducto->encabezado_id=$encabezado->id;
		    	$cargaproducto->producto_id=$prod['id'];
		    	$cargaproducto->cantidad=$prod['cantidad'];
		    	$cargaproducto->precio=$prod['precio'];
                $cargaproducto->descuento=$prod['descuento'];

		    	if ($cargaproducto->save()){
		    		$producto=Producto::findOrFail($prod['id']);
		    		$producto->stock-=$prod['cantidad'];
		    		$producto->update();
		    	}
                if($prod['descuento']){
                    $total+=($prod['precio'] * $prod['cantidad']) - ($prod['descuento'] / 100) * ($prod['precio'] * $prod['cantidad']);
                }else{
                    $total+=$prod['precio']*$prod['cantidad'];
                }
            }
            $vuelto = $this->efectivo - $total;
            
            if ($this->tipocomprobantes == "Factura") {
                $empresa = Empresa::first();
                $empresa->nro_factura += 1;
                $empresa->update();
            }
            
            Session::flash('success', '¡La compra se creó correctamente!');
            
            $this->resetInputFields();
            $this->updateMode = 0;
            
            return Redirect::to('admin/facturacion?vuelto=' . $vuelto . '&id=' . $encabezado->id);
        }            

    }

    public function openModal(){
        $this->emit('show');
    }

    public function changeEvent(){
    $producto = Producto::where('codigo', $this->selectpro)->first();
    
    if (array_key_exists($producto->id, $this->prod_cargados)) {
        $this->prod_cargados[$producto->id]['cantidad'] += 1;
    } else {
        $this->prod_cargados[$producto->id]['id'] = $producto->id;
        $this->prod_cargados[$producto->id]['codigo'] = $producto->codigo;
        $this->prod_cargados[$producto->id]['nombre'] = $producto->nombre;
        $this->prod_cargados[$producto->id]['cantidad'] = 1;
        $this->prod_cargados[$producto->id]['descuento'] = 0;
        
        // Determine which price to use based on $precioSeleccionado
        if ($this->precioSeleccionado === 'precio') {
            $this->prod_cargados[$producto->id]['precio'] = $producto->precio;
        } elseif ($this->precioSeleccionado === 'precio') {
            $this->prod_cargados[$producto->id]['precio2'] = $producto->precio2;
        } elseif ($this->precioSeleccionado === 'precio2') {
            $this->prod_cargados[$producto->id]['precio3'] = $producto->precio3;
        } else {
            // Default to regular price if no option is selected
            $this->prod_cargados[$producto->id]['precio'] = $producto->precio; // Use default price
        }
    }

    $this->selectpro = "";
}


    public function deleteitem($id){
        unset($this->prod_cargados[$id]);
    }

    public function changecantidad($cantidad,$id){
        $this->prod_cargados[$id]['cantidad']=$cantidad;
    }
    public function changedescuento($descuento, $id){
    $this->prod_cargados[$id]['descuento'] = $descuento;
}


    public function changeprecio($precio,$id){
        $this->prod_cargados[$id]['precio']=$precio;
    }
    
}
