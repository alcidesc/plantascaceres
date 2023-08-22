<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
  use HasFactory;

    protected $table='gastos';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
    	 'nombre',
        'costo',
        'gastocategoria_id',
    ];
}
