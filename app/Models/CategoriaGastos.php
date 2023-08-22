<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaGastos extends Model
{
    use HasFactory;	

    protected $table='categoria_gastos';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
    	'nombre',
		'estado',
		'observacion',
    ];

}
