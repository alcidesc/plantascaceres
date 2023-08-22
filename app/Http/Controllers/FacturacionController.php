<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facturacionencabezado;
use App\Models\Facturacionproducto;
use App\Models\Producto;
use Redirect;
use Illuminate\Support\Facades\Auth; 
use Session;

class FacturacionController extends Controller{
	public function index(){
		return view('admin.facturacion.index');
	}

	public function create(){
		return view('admin.facturacion.create');
	}

	public function store(Request $request){

		$encabezado=new Facturacionencabezado; 

        $encabezado->cliente_id=$request->get('cliente_id');
		if($request->get('credito')){
			$encabezado->estado=$request->get('credito');
		}else{
			$encabezado->estado=1;
		}
        $encabezado->vendedor_id=Auth::user()->id;
        $encabezado->descuento=$request->get('descuento');

        $total=0;

        if ($encabezado->save()){

        	$item = $request->get('producto_id');
            $cantidad = $request->get('cantidad');
            $precio = $request->get('precio');

            for ($i=0; $i < count($item); $i++) {

                $cargaproducto=new Facturacionproducto;

		    	$cargaproducto->encabezado_id=$encabezado->id;
		    	$cargaproducto->producto_id=$item[$i];
		    	$cargaproducto->cantidad=$cantidad[$i];
		    	$cargaproducto->precio=$precio[$i];

		    	if ($cargaproducto->save()){
		    		$producto=Producto::findOrFail($item[$i]);
		    		$producto->stock-=$cantidad[$i];
		    		$producto->update();
		    	}

		    	$total+=$precio[$i]*$cantidad[$i];
            }
            $descuento=$request->get('descuento');
            $efectivo=$request->get('efectivo');
            if ($descuento) {
            	$total=$efectivo-($total-(($total*$descuento)/100));
            }else{
            	$total=$efectivo-$total;
            }
            
        }

        Session::flash('success', '¡La compra se creo correctamente!');

        return Redirect::to('admin/facturacion?vuelto='.$total.'&id='.$encabezado->id);

	}

}
