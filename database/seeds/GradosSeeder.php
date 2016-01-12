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
         
	    DB::table('grados')->insert([
		    ['nombre' => 'Coronel','sigla' => 'CRL'],
		    ['nombre' => 'Teniente Coronel','sigla' => 'TCL'],
		    ['nombre' => 'Mayor','sigla' => 'MAY'],
		    ['nombre' => 'Capitan','sigla' => 'CAP'],
		    ['nombre' => 'Teniente','sigla' => 'TTE'],
		    ['nombre' => 'Subteniente','sigla' => 'STE']
		]);
	}
    
}
