<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturacionencabezadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacionencabezados', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('users');
            $table->unsignedBigInteger('vendedor_id');
            $table->foreign('vendedor_id')->references('id')->on('users');
            $table->string('tipocomprobantes');
            $table->integer('nrofactura')->nullable();
            $table->integer('timbrado')->nullable();
            $table->integer('contador')->default(0);
            $table->date('iniciovigencia')->nullable();
            $table->date('finvigencia')->nullable();
            $table->string('codigo1')->nullable();
            $table->string('codigo2')->nullable();
            $table->boolean('estado')->default(0);
            $table->string('tipoPago')->nullable();
            $table->string('banco')->nullable();
            $table->integer('numeroTarjeta')->nullable();
            $table->date('fechaCobro')->nullable();
            $table->integer('numeroBoleta')->nullable();




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
        Schema::dropIfExists('facturacionencabezados');
    }
}
