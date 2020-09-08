<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ObrasocialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::table('obrasociales')->insert(['nombre'=>'OSDE',]);
        DB::table('obrasociales')->insert(['nombre'=>'OSDEF',]);
        DB::table('obrasociales')->insert(['nombre'=>'SANCORD',]);
        DB::table('obrasociales')->insert(['nombre'=>'UNION PERSONAL',]);
        DB::table('obrasociales')->insert(['nombre'=>'UOM',]);
        DB::table('obrasociales')->insert(['nombre'=>'OSPJN',]);
        DB::table('obrasociales')->insert(['nombre'=>'OSECAC',]);
        DB::table('obrasociales')->insert(['nombre'=>'PAMI',]);
        DB::table('obrasociales')->insert(['nombre'=>'IOMA',]);
        DB::table('obrasociales')->insert(['nombre'=>'OSPIC',]);



	    }
}
