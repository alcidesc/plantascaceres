<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notificacion extends Model{
    use HasFactory;
    protected $table='notificacions';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
    	
        'usuario_id',
        'mensaje',
        'enlace',
        'sonido',
        'estado',
        
    ];
}