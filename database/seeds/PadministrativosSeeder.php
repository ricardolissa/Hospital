<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PadministrativosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
    	 	DB::table('padministrativos')->insert(['persona_id'=>'31','legajo'=>'3100',]);
         	 DB::table('padministrativos')->insert(['persona_id'=>'32','legajo'=>'3200',]);
         	 DB::table('padministrativos')->insert(['persona_id'=>'33','legajo'=>'3300',]);
         	 DB::table('padministrativos')->insert(['persona_id'=>'34','legajo'=>'3400',]);
         	 DB::table('padministrativos')->insert(['persona_id'=>'35','legajo'=>'3500',]);
         	 DB::table('padministrativos')->insert(['persona_id'=>'36','legajo'=>'3600',]);
         	 DB::table('padministrativos')->insert(['persona_id'=>'37','legajo'=>'3700',]);
         	 DB::table('padministrativos')->insert(['persona_id'=>'38','legajo'=>'3800',]);
         	 DB::table('padministrativos')->insert(['persona_id'=>'39','legajo'=>'3900',]);
         	 DB::table('padministrativos')->insert(['persona_id'=>'40','legajo'=>'40000',]);
         	 DB::table('padministrativos')->insert(['persona_id'=>'41','legajo'=>'4100',]);
         	 DB::table('padministrativos')->insert(['persona_id'=>'42','legajo'=>'4200',]);
         	 DB::table('padministrativos')->insert(['persona_id'=>'43','legajo'=>'4300',]);
         	 DB::table('padministrativos')->insert(['persona_id'=>'44','legajo'=>'4400',]);
         	 DB::table('padministrativos')->insert(['persona_id'=>'45','legajo'=>'4500',]);
         	


  
    }
}
