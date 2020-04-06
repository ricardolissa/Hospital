<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TelefonosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
 DB::table('telefonos')->insert([

          'numero'=>'29010101',   
          'persona_id'=>'1',
	]);

DB::table('telefonos')->insert([

          'numero'=>'29010202',   
          'persona_id'=>'1',
	]);



    }
}
