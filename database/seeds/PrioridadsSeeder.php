<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioridadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prioridads')->insert(['nombre'=>'1']);
        DB::table('prioridads')->insert(['nombre'=>'2']);
        DB::table('prioridads')->insert(['nombre'=>'3']);
        DB::table('prioridads')->insert(['nombre'=>'4']);
        DB::table('prioridads')->insert(['nombre'=>'5']);


	//
    }
}
