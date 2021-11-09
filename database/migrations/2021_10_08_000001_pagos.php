<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pagos extends Migration
{
    public function up()
    {

        Schema::create('Pagos', function (Blueprint $table) {
            $table->bigIncrements('folio');
            $table->date('fecha_pago');
            $table->double('monto');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
