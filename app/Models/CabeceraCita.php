<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabeceraCita extends Model{

    use HasFactory;

    protected $table='cabecera_citas';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
    	'usuario_id',
	    'cita_dia',
	    'cita_hora',
	    'estado',
    ];

}
