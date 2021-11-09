<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Actividades extends Migration
{
    public function up()
    {
        Schema::create('Actividades', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nombre_actividad');
            $table->string('descripcion');
            $table->double('costo');
            $table->boolean('tipo_actividad');
            $table->boolean('estatus');
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
