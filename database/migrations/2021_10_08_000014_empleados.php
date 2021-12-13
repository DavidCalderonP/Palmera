<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empleados extends Migration
{
    public function up()
    {
        Schema::create('Empleados', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellidoPat');
            $table->string('apellidoMat');
            $table->string('RFC');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Empleados');
    }
}
