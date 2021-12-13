<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VentasControl extends Migration
{
    public function up()
    {
        Schema::create('VentasControl', function (Blueprint $table){
            $table->bigInteger('id');
            $table->primary('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('VentasControl');
    }
}
