<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
            'name' => 'Admin',
            'no_hp' => '0812321231',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            
        ],
    
        [
            'name' => 'Partner',
            'no_hp' => '0812321321',
            'email' => 'partner@gmail.com',
            'password' => bcrypt('partner'),
            'role' => 'partner',
        ], 
          
        [
            'name' => 'user',
            'no_hp' => '0811122233',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'role' => 'user',
        ],  
        ]);
    }
}
