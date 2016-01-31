<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablaUnidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('unidades', function (Blueprint $table) {
            
             $table->string('codunijic');
             $table->primary('codunijic');
             $table->string('codudoe')->nullable();
             $table->string('nombre')->nullable();
             $table->string('sigla')->nullable();
             $table->string('jerarquia')->nullable();
             $table->integer('estado')->nullable();

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
        Schema::drop('unidades');
    }
}
