<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContenedoresXCosecha extends Migration
{
    public function up()
    {
        Schema::create('ContenedoresXCosecha', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_contenedor')->unsigned();
            $table->bigInteger('id_cosecha')->unsigned();
            $table->integer('cantidad_ingreso');
            $table->integer('cantidad_vendida');
            $table->date('fecha_ingreso');
            $table->timestamps();

            $table->foreign('id_contenedor')->references('id')->on('Contenedores');
            $table->foreign('id_cosecha')->references('id')->on('Cosecha');
        });
    }

    public function down()
    {
        //
    }
}
