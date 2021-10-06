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
            $table->string('temperatura');
            $table->string('clima');
            $table->string('humedad');
            $table->double('ph');
            $table->double('salinidad');
            $table->binary('tipo_de_predio');
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
        Schema::dropIfExists('predio');
    }
}
