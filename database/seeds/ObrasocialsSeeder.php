<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ObrasocialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obrasocials')->insert(['nombre'=>'OSDE',]);
        DB::table('obrasocials')->insert(['nombre'=>'OSDEF',]);
        DB::table('obrasocials')->insert(['nombre'=>'SANCORD',]);
        DB::table('obrasocials')->insert(['nombre'=>'UNION PERSONAL',]);
        DB::table('obrasocials')->insert(['nombre'=>'UOM',]);
        DB::table('obrasocials')->insert(['nombre'=>'OSPJN',]);
        DB::table('obrasocials')->insert(['nombre'=>'OSECAC',]);
        DB::table('obrasocials')->insert(['nombre'=>'PAMI',]);
        DB::table('obrasocials')->insert(['nombre'=>'IOMA',]);
        DB::table('obrasocials')->insert(['nombre'=>'OSPIC',]);



	    }
}
