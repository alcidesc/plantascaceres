<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model{

    use HasFactory;

    protected $table='empresas';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
        'nombre',
        'info',
        'ruc',
        'direccion',
        'logo',
        'telefono1',
        'telefono2',
        'whatsapp',
        'latitud',
        'longitud',
        'facebook',
        'instagram',
        'twitter',
        'correo',
        'fundacion',
        'lunesingreso',
        'lunessalida',
        'martesingreso',
        'martessalida',
        'miercolesingreso',
        'miercolessalida',
        'juevesingreso',
        'juevessalida',
        'viernesingreso',
        'viernessalida',
        'sabadoingreso',
        'sabadosalida',
        'domingoingreso',
        'domingosalida',
        'delivery',
        'limitedelivery',
        'costodelivery',
        'cotizaciondelivery',
    ];
}
