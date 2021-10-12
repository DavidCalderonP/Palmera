<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuelos extends Migration
{
    public function up()
    {
        Schema::create('suelos', function (Blueprint $table) {
            $table->integer('id');
            $table->string('tipo_de_suelo');
            $table->timestamps();

            $table->primary('id');
        });
    }
    public function down()
    {
        Schema::dropIfExists('suelos');
    }
}
