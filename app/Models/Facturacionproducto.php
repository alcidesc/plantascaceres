<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturacionproducto extends Model{

    use HasFactory;

    protected $table='facturacionproductos';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
    	'encabezado_id',
	    'producto_id',
	    'cantidad',
	    'precio',
        'descuento',
        
    ];

}
