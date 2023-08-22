<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabeceraPedido extends Model
{
    use HasFactory;

    protected $table='cabecera_pedidos';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
    	'latitud',
        'longitud',
        'tipoentrega',
        'costodelivery',
        'usuario_id',
        'estado',
    ];
 
}
 