<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Mail\contacto;
use App\Models\Mensaje;
use Mail;
use Redirect;

class ContactoController extends Controller{

    public function index(){

        $empresa=Empresa::findorFail(1);

        return view("frontend.contacto",["empresa"=>$empresa]);
    }	

    public function enviarcorreo(Request $request){

        $contacto1=new Mensaje;

        $contacto1->nombre=$request->get('nombre');

        $contacto1->celular=$request->get('celular');

        $contacto1->mensaje=$request->get('mensaje');

        if ($contacto1->save()) {
            
        }

    	
    	return Redirect::back()->withErrors(['msg', 'Contacto no enviado']);

    }
} 