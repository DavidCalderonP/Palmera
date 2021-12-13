<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    public function up()
    {
        Schema::create('Usuarios', function (Blueprint $table){
            $table->string('correo_electronico');
            $table->string('contra');
            $table->bigInteger('id_empleado')->unsigned();
            $table->bigInteger('id_cliente')->unsigned();
            $table->timestamps();

            $table->primary('correo_electronico');
            $table->foreign('id_empleado')->references('id')->on('Empleados');
            $table->foreign('id_cliente')->references('id')->on('Clientes');

        });
    }

    public function down()
    {
        Schema::dropIfExists('Usuarios');
    }
}
