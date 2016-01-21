<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuarioParte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_unidad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario')->unsigned()->index();
            $table->foreign('usuario')->references('id')->on('usuarios')->OnDelete('cascade');
            $table->string('unidad')->index();
            $table->foreign('unidad')->references('codunijic')->on('unidades')->OnDelete('cascade');
            
            $table->boolean('estado');
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
        //Schema::drop('usuario_unidad');
        Schema::drop('usuarios');
        Schema::drop('grados');
        Schema::drop('roles');
    }
}
