<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name' => 'Huaxiang',
                'role_id' => 1, //admin
                'email' => 'admin@gmail.com',
                'password' => Hash::make('huaxiangciabe'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sasa',
                'role_id' => 2, //member
                'email' => 'sasa@gmail.com',
                'password' => Hash::make('huaxiangciabe'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bing',
                'role_id' => 2, //member
                'email' => 'bing@gmail.com',
                'password' => Hash::make('huaxiangciabe'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
