<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model{

    use HasFactory;
    
    protected $table='productos';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
        'nombre',
        'descripcion',
        'slug',
        'codigo',
        'precio',
        'precio2',
        'precio3',
        'stock',
        'oferta',
        'iva',
        'estado',
        'foto',
        'tipo',
    ];
}
