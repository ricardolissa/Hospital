<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        DB::table('roles')->insert(['name'=>'admin','descripcion'=>'administrador del sistema']);
        DB::table('roles')->insert(['name'=>'pad','descripcion'=>'personal administrivo']);
        DB::table('roles')->insert(['name'=>'medico','descripcion'=>'personal medico]']);
        DB::table('roles')->insert(['name'=>'jmedico','descripcion'=>'jefe del area medica']);
       
    }
}
