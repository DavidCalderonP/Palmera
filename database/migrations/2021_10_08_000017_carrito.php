<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Carrito extends Migration
{
    public function up()
    {
        Schema::create('Carrito', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('cantidad');
            $table->bigInteger('id_variedad')->unsigned();
            $table->bigInteger('id_cliente')->unsigned();
            $table->timestamps();

            $table->foreign('id_variedad')->references('idVariedad')->on('VariedadDeDatil');
            $table->foreign('id_cliente')->references('id')->on('Users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Carrito');
    }
}
