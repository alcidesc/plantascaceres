<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Mensaje;
use App\Models\notificacion;
use Mail;
use Redirect;
use App\Models\User;

class ContactoController extends Controller
{
    public function index()
    {
        $empresa = Empresa::findorFail(1);

        return view("frontend.contacto", ["empresa" => $empresa]);
    }

    public function enviarcorreo(Request $request)
    {
        $contacto1 = new Mensaje;
        $contacto1->nombre = $request->get('nombre');
        $contacto1->celular = $request->get('celular');
        $contacto1->mensaje = $request->get('mensaje');

        if ($contacto1->save()) {
            // Guardar en la tabla de notificaciones
            $notificacion = new notificacion;
            $notificacion->usuario_id = $request->user()->id; // Suponiendo que tienes un sistema de autenticación y usuario actual
            $notificacion->mensaje = 'Nuevo mensaje de contacto recibido.';
            $notificacion->enlace = ''; // Agrega aquí los enlaces si es necesario
            $notificacion->sonido = '0'; // Agrega aquí el sonido si es necesario
            $notificacion->estado = '0'; // Puedes establecer el estado de la notificación

            $notificacion->save();
            
            $administradores = user::where('nivel', 1)->where('estado', 1)->get();

            // Guardar notificación para cada administrador
            foreach ($administradores as $administrador) {
                $notificacionAdmin = new Notificacion();
                $notificacionAdmin->usuario_id = $administrador->id;
                $notificacionAdmin->mensaje = 'Nuevo mensaje de contacto recibido.';
                $notificacionAdmin->enlace = '/admin/mensajes'; // Agrega aquí los enlaces si es necesario
                $notificacionAdmin->sonido = '0'; // Agrega aquí el sonido si es necesario
                $notificacionAdmin->estado = '0'; // Puedes establecer el estado de la notificación
    
                $notificacionAdmin->save();
            }
    
            return Redirect::back()->with('success', 'Mensaje de contacto enviado con éxito.');
        }
    }
}
 