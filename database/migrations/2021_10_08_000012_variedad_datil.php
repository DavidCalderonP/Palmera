<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VariedadDatil extends Migration
{
    public function up()
    {
        Schema::create('VariedadDeDatil', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nombre_datil');
            $table->string('descripcion');
            $table->double('costo');
            $table->boolean('tipo_datil');
            $table->boolean('estatus');
            $table->timestamps();

        });
    }
    public function down()
    {
        //
    }
}
