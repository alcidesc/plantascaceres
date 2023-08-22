<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compraproductos extends Model
{
    use HasFactory;

    protected $table='compraproductos';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
    	'producto_id',
	    'cantidad',
	    'precio',
	    'cabecera_id',
    ];
}
