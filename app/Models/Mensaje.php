<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model{
    use HasFactory;
    protected $table='mensajes';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
        'nombre',
        'celular',
        'mensaje',
        'estado',
    ];
}
