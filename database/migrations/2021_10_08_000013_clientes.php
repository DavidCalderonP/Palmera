<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clientes extends Migration
{
    public function up()
    {
        Schema::create('Clientes', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellidoPat');
            $table->string('apellidoMat');
            $table->string('calle');
            $table->string('numero');
            $table->string('colonia');
            $table->string('cp');
            $table->string('referencias');
            $table->string('numero_contacto');
            $table->timestamps();


        });
    }

    public function down()
    {
        //
    }
}
