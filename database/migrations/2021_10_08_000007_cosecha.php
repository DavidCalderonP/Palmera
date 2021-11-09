<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cosecha extends Migration
{
    public function up()
    {
        Schema::create('Cosecha', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('id_palmera');
            $table->double('kilogramos');
            $table->date('fecha_cosecha');
            $table->boolean('tipo_cosecha');
            $table->boolean('estatus');
            $table->timestamps();

            $table->foreign('id_palmera')->references('id')->on('Palmeras');

        });
    }

    public function down()
    {
        //
    }
}
