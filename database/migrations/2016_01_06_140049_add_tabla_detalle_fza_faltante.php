<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablaDetalleFzaFaltante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_fza_faltante', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partefza_id')->unsigned();
            $table->integer('motivo_id')->unsigned();

            $table->foreign('partefza_id')->references('id')->on('parte_fuerza');
            $table->foreign('motivo_id')->references('id')->on('motivos');
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
        Schema::drop('detalle_fza_faltante');
    }
}
