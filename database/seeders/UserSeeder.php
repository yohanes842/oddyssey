<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Huaxiang',
            'user_type' => 'member',
            'email' => 'email@gmail.com',
            'password' => 'sa;fjaslfjs',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
