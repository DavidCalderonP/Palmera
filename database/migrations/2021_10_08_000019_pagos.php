<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pagos extends Migration
{
    public function up()
    {

        Schema::create('Pagos', function (Blueprint $table) {
            $table->bigInteger('folio')->unsigned();
            $table->date('fecha_pago');
            $table->double('monto');
            $table->timestamps();

            $table->primary('folio');
            $table->foreign('folio')->references('folio')->on('Ventas');
        });
    }

    public function down()
    {
        //
    }
}
