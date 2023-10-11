<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioCita extends Model{

    use HasFactory;

    protected $table='servicio_citas';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
        'cabecera_id',
        'servicio_id',
        'precio', 
    ];

}
