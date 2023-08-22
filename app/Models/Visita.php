<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model{

    use HasFactory;

    protected $table='visitas';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
    	'producto_id',
        'usuario_id',
    ];
}
