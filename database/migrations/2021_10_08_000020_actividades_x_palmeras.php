<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActividadesXPalmeras extends Migration
{

    public function up()
    {
        Schema::create('ActividadesPorPalmeras', function (Blueprint $table){
            $table->string('id');
            $table->string('palmera_id');
            $table->bigInteger('actividad_id')->unsigned();
            $table->string('anio');
            $table->date('fecha_programada');
            $table->date('fecha_ejecucion')->nullable();
            $table->integer('empleado_programo');
            $table->integer('empleado_ejecuto')->nullable();
            $table->double('costo');
            $table->timestamps();

            $table->primary('id');
            $table->foreign('id_palmera')->references('id')->on('Palmeras');
            $table->foreign('id_actividad')->references('id')->on('Actividades');
        });
    }

    public function down()
    {
        //
    }
}
