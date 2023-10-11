<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Image, file;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
use Illuminate\Support\Facades\Auth; 
use App\Models\CabeceraCita;
use App\Models\ServicioCita;
use App\Models\CategoriaProducto;
use App\Models\Categoria;
use Carbon\Carbon;
use DB;

class ServicioController extends Controller
{
    public function index(){
        return view("admin.servicios.index");

    }

    public function create(){
        $categorias=Categoria::where("estado",1)->get();
        return view("admin.servicios.create",["categorias"=>$categorias]);
    }

    public function store(Request $request) {

        $servicio=new Producto;

        $servicio->nombre=$request->get('nombre');

        if($file = $request->file('foto')) {
            $control=0;
            $nombre = rand().".".$file->getClientOriginalExtension();
            while ($control == 0) {
                if (is_file( public_path() . '/images/servicios/' . $nombre )) {
                    $nombre = rand() . $nombre;
                }else{
                    Image::make($request->file('foto'))
                        ->heighten(1000)
                        ->save(public_path() . '/images/servicios/' . $nombre);
                    $servicio->foto=$nombre;
                    $control=1; 
                }
            }
        }

		$servicio->codigo=$request->get('nombre');
        $servicio->description=$request->get('description');
		$servicio->precio=str_replace(".","",$request->get('precio'));
		$servicio->oferta=str_replace(".","",$request->get('oferta'));
        $servicio->stock=1000;
        $servicio->tipo=2;

        if ($servicio->save()){
            
            foreach ($request->categorias as $categoria){
		    	$categoriaservicio=new CategoriaProducto;

		    	$categoriaservicio->producto_id=$servicio->id;
		    	$categoriaservicio->categoria_id=$categoria;

		    	$categoriaservicio->save();
            }

            Session::flash('success', '¡El servicio se creo correctamente!');
        }

        return Redirect::to('admin/servicios');
	}	

    public function show($id) {
        $servicio=Producto::findOrFail($id);  

        $categoriaproducto=DB::table('categoria_productos as cp')
            ->join('productos as p','cp.producto_id','p.id')
            ->join('categorias as c','cp.categoria_id','c.id')
            ->select('c.nombre')
            ->where('p.id',$id)->get();
        
        return view('admin.servicios.show',["servicio"=>$servicio,"categoriaproducto"=>$categoriaproducto]);  
    }

    public function edit($id) {
        $servicio=Producto::findOrFail($id);  
        $categorias=Categoria::where("estado",1)->get();

        $categoriaservicios=CategoriaProducto::select('categoria_id')->where('producto_id',$id)->get();

        return view('admin.servicios.edit',["servicio"=>$servicio,"categoriaservicios"=>$categoriaservicios,"categorias"=>$categorias]);
    }

    public function update(Request $request,$id) {

        $servicio=Producto::findOrFail($id); 

        $servicio->nombre=$request->get('nombre');

        if($file = $request->file('foto')) {
            $control=0;
            $nombre = rand().".".$file->getClientOriginalExtension();
            while ($control == 0) {
                if (is_file( public_path() . '/images/servicios/' . $nombre )) {
                    $nombre = rand() . $nombre;
                }else{
                    Image::make($request->file('foto'))
                        ->heighten(1000)
                        ->save(public_path() . '/images/servicios/' . $nombre);
                    $servicio->foto=$nombre;
                    $control=1;
                }
            }
        }

        $servicio->codigo=$request->get('nombre');
        $servicio->description=$request->get('description');
        $servicio->precio=str_replace(".","",$request->get('precio'));
		$servicio->oferta=str_replace(".","",$request->get('oferta'));
        $servicio->stock=1000;

        if ($servicio->update()){
            
            $categoriaservicios=CategoriaProducto::where('producto_id',$id)->get();

            foreach ($categoriaservicios as $value){
                $value->delete();
            }

            foreach ($request->categorias as $categoria){
                $categoriaservicio=new CategoriaProducto;

                $categoriaservicio->producto_id=$servicio->id;
                $categoriaservicio->categoria_id=$categoria;

                $categoriaservicio->save();
            }

            Session::flash('success', '¡El servicio se creo correctamente!');
        }

        return Redirect::to('admin/servicios');
    }	

    public function enviarsolicitud(Request $request){

        if ($request->get('cita_dia') == 'lunes'){
            $date = new Carbon('next monday');
        }elseif ($request->get('cita_dia') == 'martes'){
            $date = new Carbon('next tuesday');
        }elseif ($request->get('cita_dia') == 'miercoles'){
            $date = new Carbon('next wednesday');
        }elseif ($request->get('cita_dia') == 'jueves'){
            $date = new Carbon('next thursday');
        }elseif ($request->get('cita_dia') == 'viernes'){
            $date = new Carbon('next friday');
        }elseif ($request->get('cita_dia') == 'sabado'){
            $date = new Carbon('next saturday');
        }elseif ($request->get('cita_dia') == 'domingo'){
            $date = new Carbon('next sunday');
        }

        $cabecera=new CabeceraCita;

        $cabecera->cita_dia=$date->format('Y-m-d');
        $cabecera->cita_hora=$request->get('cita_hora');
        $cabecera->usuario_id=Auth::user()->id;

        if ($cabecera->save()) {
            $servicio = $request->get('servicio_id');

            for ($i=0; $i < count($servicio); $i++) {
                $pedido=new ServicioCita;

                $pedido->cabecera_id=$cabecera->id;
                $porciones = explode("id", $request->get('servicio_id')[$i]);
                $pedido->servicio_id=$porciones[1];
                $pedido->precio=$request->get('precio')[$i];

                $pedido->save();
                Cart::remove([
                    'id' => $request->get('servicio_id')[$i],
                ]);
            }
        }

        Session::flash('success', '¡Su cita se agendo correctamente, en breve nos comunicaremos un Ud.!');

        return Redirect::to('/');

    }
}