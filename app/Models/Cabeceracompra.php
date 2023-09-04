<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabeceracompra extends Model
{
    use HasFactory;

    protected $table='cabeceracompras';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
    	'nfactura',
        'proveedor_id',
        'usuario_id',
        'TipoPago',
        'banco',
        'numeroTarjeta',
        'fechaPago',
        'tipoCompra',
        'numeroBoletas',
    ];
}
