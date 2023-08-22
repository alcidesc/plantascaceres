<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model{

    use HasFactory;

    protected $table='creditos';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
    	'cliente_id',
        'monto',
        'cobrador_id',
        'estado',
    ];
        

}
