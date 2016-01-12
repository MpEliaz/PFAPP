<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut')->unique();
            $table->string('nombres');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->string('password');
            $table->integer('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->boolean('estado');
            $table->rememberToken();
            
            $table->integer('grado_id')->unsigned();
            $table->foreign('grado_id')->references('id')->on('grados');
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
        Schema::drop('usuarios');
    }
}
