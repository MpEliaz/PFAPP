<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablaParteFuerza extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parte_fuerza', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unidad_id')->unsigned();
           // $table->foreign('unidad')->references('id')->on('unidades');
            $table->integer('responsable');
            $table->foreign('responsable')->references('id')->on('usuarios');
            $table->dateTime('creado_el');
            $table->boolean('estado');
            $table->integer('fuerza_total');
            $table->integer('forman_total');
            $table->integer('faltan_total');

            $table->integer('of_fuerza');
            $table->integer('of_forman');
            $table->integer('of_faltan');

            $table->integer('cp_fuerza');
            $table->integer('cp_forman');
            $table->integer('cp_faltan');

            $table->integer('sltp_fuerza');
            $table->integer('sltp_forman');
            $table->integer('sltp_faltan');

            $table->integer('slc_fuerza');
            $table->integer('slc_forman');
            $table->integer('slc_faltan');

            $table->integer('ec_fuerza');
            $table->integer('ec_forman');
            $table->integer('ec_faltan');

            $table->integer('alumnos_fuerza');
            $table->integer('alumnos_forman');
            $table->integer('alumnos_faltan');

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
        Schema::drop('parte_fuerza');
    }
}
