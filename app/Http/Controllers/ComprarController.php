<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\CabeceraPedido;
use App\Models\Pedido;
use Redirect;
use Cart;
use Illuminate\Support\Facades\Auth; 
use Session;

class ComprarController extends Controller{
    
    public function index(){

    	$empresa=Empresa::findOrFail(1); 

        return view('frontend.comprar',["empresa"=>$empresa]);

    }

    public function enviarpedido(Request $request){

    	$cabecera=new CabeceraPedido;

        $cabecera->latitud=$request->get('latitud');
        $cabecera->longitud=$request->get('longitud');
        $cabecera->tipoentrega=$request->get('metodoentrega');
        $cabecera->costodelivery=$request->get('costodelivery');
        $cabecera->usuario_id=Auth::user()->id;

        if ($cabecera->save()) {
        	$productos = $request->get('producto_id');

            for ($i=0; $i < count($productos); $i++) {
        		$pedido=new Pedido;

        		$pedido->cabecera_id=$cabecera->id;
                $porciones = explode("id", $request->get('producto_id')[$i]);
        		$pedido->producto_id=$porciones[1];
        		$pedido->cantidad=$request->get('cantidad')[$i];
        		$pedido->precio=$request->get('precio')[$i];

        		$pedido->save();
                Cart::remove([
                    'id' => $request->get('producto_id')[$i],
                ]);
        	}
        }

        Session::flash('success', '¡Su pedido se realizo correctamente correctamente!');

        return Redirect::to('/');

    }

}
