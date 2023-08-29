<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturacionproductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacionproductos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('encabezado_id');
            $table->foreign('encabezado_id')->references('id')->on('facturacionencabezados');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->float('cantidad');
            $table->integer('precio');
            $table->integer('descuento')->default(0);
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
        Schema::dropIfExists('facturacionproductos');
    }
}
