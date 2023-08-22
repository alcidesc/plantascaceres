<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table='proveedors';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
        'nombre',
        'ruc',
        'direccion',
        'estado',
        'contacto',
    ];
}
