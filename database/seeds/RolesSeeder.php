<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
	    DB::table('roles')->insert([
		    ['nombre' => 'Administrador','estado' => 1],
		    ['nombre' => 'Supervisor', 'estado' => 1],
            ['nombre' => 'Usuario', 'estado' => 1]
		]);
	}
    
}
