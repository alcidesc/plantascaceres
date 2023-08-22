<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->longText('info');
            $table->string('ruc')->nullable();
            $table->string('direccion');
            $table->string('logo')->nullable();
            $table->string('telefono1');
            $table->string('telefono2')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('latitud');
            $table->string('longitud');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('correo')->nullable();
            $table->date('fundacion');
            $table->time('lunesingreso')->nullable();
            $table->time('lunessalida')->nullable();
            $table->time('martesingreso')->nullable();
            $table->time('martessalida')->nullable();
            $table->time('miercolesingreso')->nullable();
            $table->time('miercolessalida')->nullable();
            $table->time('juevesingreso')->nullable();
            $table->time('juevessalida')->nullable();
            $table->time('viernesingreso')->nullable();
            $table->time('viernessalida')->nullable();
            $table->time('sabadoingreso')->nullable();
            $table->time('sabadosalida')->nullable();
            $table->time('domingoingreso')->nullable();
            $table->time('domingosalida')->nullable();
            $table->boolean('delivery')->default(0);
            $table->integer('limitedelivery')->nullable();
            $table->string('costodelivery')->nullable();
            $table->integer('cotizaciondelivery')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
