<?php

use Illuminate\Database\Seeder;

class MotivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('motivos')->insert([
		    ['motivo' => 'Servicio Especial','estado' => 1],
		    ['motivo' => 'Feriado Legal','estado' => 1],
		    ['motivo' => 'Permiso Administrativo','estado' => 1],
		    ['motivo' => 'Licencia Medica','estado' => 1],
		    ['motivo' => 'Comision de servicio','estado' => 1],
		    ['motivo' => 'Otro','estado' => 1]
		]);
    }
}
