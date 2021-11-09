<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suelos extends Migration
{
    public function up()
    {
        Schema::create('Suelos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->timestamps();

        });
    }
    public function down()
    {
        Schema::dropIfExists('suelos');
    }
}
