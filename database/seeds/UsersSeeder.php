<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
            'name' => 'Pedro Morales Enríquez',
            'email' => 'pedrome203@hotmail.com',
            'password' => '$2y$10$j3CAkA6HcztJ5iBEXXFHcOdQnw7/DofuVNVY1XkLpDrjuCW0OxIZq',
            'phone' => '3521251071',
            'address' => 'Av. Siempre Viva',
        ]);
 
    }
}
