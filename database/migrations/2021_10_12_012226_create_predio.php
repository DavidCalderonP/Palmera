<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredio extends Migration
{
    public function up()
    {
        Schema::create('predio', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->integer('metros_cuadrados');
            $table->integer('palmeras_destinadas');
            $table->integer('tipo_de_suelo');
            $table->integer('temperatura');
            $table->integer('clima');
            $table->integer('humedad');
            $table->double('ph');
            $table->double('salinidad');
            $table->boolean('tipo_de_predio');
            $table->boolean('estatus')->nullable();
            $table->timestamps();

            $table->primary('id');

            $table->foreign('clima')->references('id')->on('clima');
            $table->foreign('humedad')->references('id')->on('humedad');
            $table->foreign('tipo_de_suelo')->references('id')->on('suelos');
        });
    }
    public function down()
    {
        Schema::dropIfExists('predio');
    }
}
