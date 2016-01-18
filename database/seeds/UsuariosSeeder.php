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
		DB::table('usuarios')->insert([
			'rut' => '17.288.811-9',
			'nombres' => 'Elías Enoc',
			'apellido_m' => 'Millachine',
			'apellido_p' => 'Pérez',
			'password' => bcrypt('123'),
			'rol_id' => 1,
			'estado' => 1,
			'grado_id' => 1
		]);
    }
}
