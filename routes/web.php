<?php

use Illuminate\Support\Facades\Route;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\Empresa;
use App\Models\Producto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Ruta de administradores
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/admin/compras', function () {
    return view('admin.compras.index');
})->middleware('auth');

Route::get('admin/categorias', function () {
    return view('admin.categorias.index');
})->middleware('auth');
Route::get('admin/productos', function () {
    return view('admin.productos.index');
})->middleware('auth');

Route::get('admin/empresa', function () {
    return view('admin.empresa.index');
})->middleware('auth');

Route::get('/admin/mensajesproductos', function () {
    return view('admin.mensajesproductos.index');
})->middleware('auth');

Route::resource('/admin/facturacion', App\Http\Controllers\FacturacionController::class)->middleware('auth');

Route::get('/admin/listafacturas', function () {
    return view('admin.listafacturas.index');
})->middleware('auth');
Route::post('facturas-export', [App\Http\Controllers\PDFController::class, 'facturasexport'])->name('facturas-export')->middleware('auth');
Route::resource('/admin/proveedores', App\Http\Controllers\ProveedorController::class)->middleware('auth');

Route::get('/admin/categoriagastos', function () {
    return view('admin.categoriagastos.index');
})->middleware('auth');
Route::get('/admin/fecha-extraccion', function () {
    return view('admin.fecha-extraccion.index');
})->middleware('auth');

Route::get('/admin/categoriagastos/{id}', function ($id) {
    return view('admin.gastos.index',["categoriaGastoId"=>$id]);
})->middleware('auth');

Route::get('/admin/infoproductos', function () {
    return view('admin.infoproductos.index');
})->middleware('auth');

Route::get('/admin/fecha-deposito', function () {
    return view('admin.fecha-deposito.index');
})->middleware('auth');

Route::get('/admin/contabilidad', function () {
    return view('admin.contabilidad.index');
})->middleware('auth');

Route::resource('/admin/empresa', App\Http\Controllers\EmpresaController::class)->middleware('auth');

 Route::get('/admin/tipoPago', function () {
    return view('admin.tipoPago.index');
 })->middleware('auth');


//Ruta Frontend
Route::get('/', function () {
    $empresa=Empresa::first();
    $texto = preg_replace ('/<[^>]*>/', ' ', $empresa->info);
    SEO::setTitle('► '.$empresa->nombre);
    SEO::setDescription(substr($texto, 0, 300));
    OpenGraph::addImage('https://www.plantascaceres.com/images/empresa/'.$empresa->logo, ['height' => 300, 'width' => 300]);

    return view('index');
});
Route::get('/product/{slug}', function ($slug) {
    $producto = Producto::where('slug',$slug)->first();
    $texto = preg_replace ('/<[^>]*>/', ' ', $producto->descripcion);
    SEO::setTitle('► '.$producto->nombre);
    SEO::setDescription(substr($texto, 0, 300));
    SEOMeta::setCanonical('https://www.plantascaceres.com/product/'.$producto->slug);
    SEOTools::opengraph()->addProperty('product:brand', 'Plantas Caceres');
    SEOTools::opengraph()->addProperty('product:condition', 'new');
    SEOTools::opengraph()->addProperty('product:availability', 'in stock');
    SEOTools::opengraph()->addProperty('product:item_group_id', $producto->id);
    SEOTools::opengraph()->addProperty('product:price:amount', $producto->precio);
    SEOTools::opengraph()->addProperty('product:price:currency', 'PYG');
    SEOTools::opengraph()->addProperty('product:retailer_item_id', $producto->slug);
    OpenGraph::addImage('https://www.plantascaceres.com/images/productos/'.$producto->foto, ['height' => 300, 'width' => 300]);

    return view('frontend.view',["slug"=>$slug]);
});
Route::get('/quienessomos', function () {
    $empresa=Empresa::first();
    $texto = preg_replace ('/<[^>]*>/', ' ', $empresa->info);
    SEO::setTitle('► Quienes Somos');
    SEO::setDescription(substr($texto, 0, 300));
    OpenGraph::addImage('https://www.plantascaceres.com/images/empresa/'.$empresa->logo, ['height' => 300, 'width' => 300]);

    return view('frontend.acerca');
});
Route::get('/admin/mensajes', function () {
    return view('admin.mensajes.index');
})->middleware('auth');
Route::post('/enviarcorreo', [App\Http\Controllers\ContactoController::class, 'enviarcorreo'])->name('enviarcorreo');
Route::get('/productos', function () {
    $empresa=Empresa::first();
    $texto = preg_replace ('/<[^>]*>/', ' ', $empresa->info);
    SEO::setTitle('► Productos');
    SEO::setDescription(substr($texto, 0, 300));
    OpenGraph::addImage('https://www.plantascaceres.com/images/empresa/'.$empresa->logo, ['height' => 300, 'width' => 300]);

    return view('frontend.productos');
});
Route::get('/contacto', [App\Http\Controllers\ContactoController::class, 'index'])->name('contacto');
Route::post('/enviarcorreo', [App\Http\Controllers\ContactoController::class, 'enviarcorreo'])->name('enviarcorreo');
Route::get('/carrito', function () {
    return view('frontend.carrito');
});
Route::get('/comprar', [App\Http\Controllers\ComprarController::class, 'index'])->name('comprar')->middleware('auth');
Route::post('/enviarpedido', [App\Http\Controllers\ComprarController::class, 'enviarpedido'])->name('enviarpedido');
Route::get('/perfil', function () {
    return view('frontend.perfil');
})->middleware('auth');
Route::get('/verproductos', function () {
    $empresa=Empresa::first();
    $texto = preg_replace ('/<[^>]*>/', ' ', $empresa->info);
    SEO::setTitle('► Productos');
    SEO::setDescription(substr($texto, 0, 300));
    OpenGraph::addImage('https://www.plantascaceres.com/images/empresa/'.$empresa->logo, ['height' => 300, 'width' => 300]);

    return view('frontend.verproductos');
});

Route::resource('/admin/servicios', App\Http\Controllers\ServicioController::class)->middleware('auth');
