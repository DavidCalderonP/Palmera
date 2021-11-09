<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contenedores extends Migration
{
    public function up()
    {
        Schema::create('Contenedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('cantidad_maxima');
            $table->double('cantidad_vendida');
            $table->double('cantidad_actual');
            $table->boolean('tipo_cosecha');
            $table->boolean('estatus');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
