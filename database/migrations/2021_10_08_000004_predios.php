<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Predios extends Migration
{
    public function up()
    {
        Schema::create('Predios', function (Blueprint $table){
            $table->string('id');
            $table->integer('metros_cuadrados');
            $table->integer('numero_palmeras');
            $table->bigInteger('tipo_de_suelo')->unsigned();
            $table->double('ph');
            $table->double('salinidad');
            $table->boolean('tipo_de_predio');
            $table->string('descripcion');
            $table->date('fecha_creacion');
            $table->boolean('estatus');
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
            $table->foreign('tipo_de_suelo')->references('id')->on('Suelos');

        });

    }
   public function down()
    {
        //
    }
}
