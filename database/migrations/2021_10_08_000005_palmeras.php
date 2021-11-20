<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Palmeras extends Migration
{
    public function up()
    {
        Schema::create('Palmeras', function (Blueprint $table){
            $table->string('id');
            $table->boolean('tipo_palmera');
            $table->string('predio_id');
            $table->bigInteger('tipo_datil')->unsigned();
            $table->boolean('estatus');
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
            $table->foreign('predio_id')->references('id')->on('Predios');
            $table->foreign('tipo_datil')->references('id')->on('TipoDeDatil');

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
