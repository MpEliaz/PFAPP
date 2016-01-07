<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
    	foreach (range(1,10) as $index) {
	        DB::table('usuarios')->insert([
	            'rut' => $faker->email,
	            'nombres' => $faker->firstNameMale,
	            'apellido_p' => $faker->lastName,
	            'apellido_m' => $faker->lastName,
	            'password' => bcrypt('secret'),
	            'rol' => 1,
	            'estado' => true
	        ]);
    }
}
