<?php

use Illuminate\Database\Seeder;

class GradosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
	    DB::table('grados')->insert(['nombre' => '','sigla' => '']);
    
}
