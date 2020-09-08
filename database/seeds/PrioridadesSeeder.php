<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioridadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prioridades')->insert(['nombre'=>'1']);
        DB::table('prioridades')->insert(['nombre'=>'2']);
        DB::table('prioridades')->insert(['nombre'=>'3']);
        DB::table('prioridades')->insert(['nombre'=>'4']);
        DB::table('prioridades')->insert(['nombre'=>'5']);


	//
    }
}
