<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predio', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->integer('metros_cuadrados');
            $table->integer('palmeras_destinadas');
            $table->string('tipo_de_suelo');
            $table->integer('temperatura');
            $table->integer('clima');
            $table->integer('humedad');
            $table->double('ph');
            $table->double('salinidad');
            $table->boolean('tipo_de_predio');
            $table->timestamps();

            $table->primary('id');

            $table->foreign('clima')->references('id')->on('clima');
            $table->foreign('humedad')->references('id')->on('humedad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('predio');
    }
}
