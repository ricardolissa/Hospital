<?php

use Illuminate\Database\Seeder;

class EspcialidadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('especialidades')->insert(['nombre'=>'Traumatologo',]); //
       DB::table('especialidades')->insert(['nombre'=>'Clinico',]); //
       DB::table('especialidades')->insert(['nombre'=>'Cirujano',]); //
       DB::table('especialidades')->insert(['nombre'=>'Neurologo',]); //
       DB::table('especialidades')->insert(['nombre'=>'Urologo',]); //
       DB::table('especialidades')->insert(['nombre'=>'Pediatra',]); //
       DB::table('especialidades')->insert(['nombre'=>'Cardiologo',]); //
       DB::table('especialidades')->insert(['nombre'=>'Alergista',]); //
       DB::table('especialidades')->insert(['nombre'=>'Dermatologo',]); //
       DB::table('especialidades')->insert(['nombre'=>'Cirujano Oncologico',]); //
       DB::table('especialidades')->insert(['nombre'=>'Ecografo',]); //
    }
}
