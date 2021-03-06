<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LineaDeVenta extends Migration
{
    public function up()
    {
        Schema::create('LineaDeVenta', function(Blueprint $table){
            $table->bigInteger('folio')->unsigned();
            $table->bigInteger('id_contenedor')->unsigned();
            $table->bigInteger('id_datil')->unsigned();
            $table->integer('cantidad');
            $table->double('precio');
            $table->timestamps();

            $table->primary('folio');
            $table->foreign('folio')->references('folio')->on('Ventas');
            $table->foreign('id_contenedor')->references('id')->on('Contenedores');
            $table->foreign('id_datil')->references('idVariedad')->on('VariedadDeDatil');
        });
    }

    public function down()
    {
        Schema::dropIfExists('LineaDeVenta');
    }
}
