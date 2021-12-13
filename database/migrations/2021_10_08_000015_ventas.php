<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ventas extends Migration
{
    public function up()
    {
        Schema::create('Ventas', function (Blueprint $table){
            $table->bigIncrements('folio');
            $table->date('fecha_venta');
            $table->date('fecha_entrega')->nullable();
            $table->bigInteger('id_cliente')->unsigned();
            $table->bigInteger('id_empleado')->unsigned();
            $table->boolean('estatus');

            $table->foreign('id_cliente')->references('id')->on('users');
            $table->foreign('id_empleado')->references('id')->on('users');
        });
    }

    public function down()
    {
        //Schema::dropIfExists('Ventas');
    }
}
