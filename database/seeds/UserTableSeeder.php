<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      	 User::create([
      	 	
            'name' => '41',
            'email'=> '4141d@adad.com',
            'password'=> '4444',
            'role_id'=> 12
            
      	 ]);
                        
    }
}
