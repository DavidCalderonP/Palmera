<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TipoDatil extends Migration
{
    public function up()
    {
        Schema::create('TipoDeDatil', function (Blueprint $table){
           $table->bigIncrements('id');
           $table->string('nombre_datil');
           $table->string('descripcion');
           $table->double('costo');
           $table->boolean('tipo');
           $table->boolean('estatus');
           $table->timestamps();
        });
    }

   public function down()
    {
        //
    }
}
