<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LineaDeVenta extends Migration
{
    public function up()
    {
        Schema::create('LineaDeVenta', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('id_contenedor');
            $table->integer('cantidad');
            $table->double('precio');
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
        //
    }
}
