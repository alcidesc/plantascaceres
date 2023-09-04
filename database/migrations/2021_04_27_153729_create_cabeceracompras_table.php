<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabeceracomprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabeceracompras', function (Blueprint $table) {
            $table->id();

            $table->string('nfactura');

            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('proveedors');

            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users');

            $table->integer('estado')->default(1);
            $table->string('tipoPago')->nullable();
            $table->string('banco')->nullable();
            $table->integer('numeroTarjeta')->nullable();
            $table->integer('tipoCompra')->nullable();
            $table->date('fechaPago')->nullable();
            $table->integer('numeroBoletas')->nullable();

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
        Schema::dropIfExists('cabeceracompras');
    }
}
