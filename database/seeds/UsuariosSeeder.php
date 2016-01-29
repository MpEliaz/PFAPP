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
			'unidad_id' => 'C000002',
			'nombres' => 'Elías Enoc',
			'apellido_p' => 'Millachine',
			'apellido_m' => 'Pérez',
			'password' => bcrypt('123'),
			'rol_id' => 1,
			'estado' => 1,
			'grado_id' => 1
		]);

		DB::table('usuarios')->insert([
			'rut' => '11.111.111-1',
			'unidad_id' => 'C000007',
			'nombres' => 'Tony',
			'apellido_p' => 'Stark',
			'apellido_m' => 'Stark',
			'password' => bcrypt('123'),
			'rol_id' => 2,
			'estado' => 1,
			'grado_id' => 4
		]);
    }
}
