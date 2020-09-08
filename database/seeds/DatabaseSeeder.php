<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // La creación de datos de roles debe ejecutarse primero
    /*$this->call(RoleTableSeeder::class);
    // Los usuarios necesitarán los roles previamente generados
    $this->call(UserTableSeeder::class);
*/

    $this->call(PersonasSeeder::class);
     $this->call(TelefonosSeeder::class);
     $this->call(ObrasocialesSeeder::class);
     $this->call(PrioridadesSeeder::class);
      $this->call(MedicosSeeder::class);
       $this->call(PadministrativosSeeder::class);
         $this->call(PacientesSeeder::class);
               }
}
