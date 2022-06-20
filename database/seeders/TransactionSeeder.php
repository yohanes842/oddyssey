<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'game_id'=> 1,
                'user_id'=>1,
                'purchased_at'=> now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id'=> 2,
                'user_id'=>1,
                'purchased_at'=> now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id'=> 3,
                'user_id'=>1,
                'purchased_at'=> now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id'=> 4,
                'user_id'=>1,
                'purchased_at'=> now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id'=> 5,
                'user_id'=>1,
                'purchased_at'=> now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id'=> 1,
                'user_id'=>2,
                'purchased_at'=> now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id'=> 2,
                'user_id'=>2,
                'purchased_at'=> now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id'=> 3,
                'user_id'=>2,
                'purchased_at'=> now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id'=> 3,
                'user_id'=>3,
                'purchased_at'=> now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id'=> 6,
                'user_id'=>3,
                'purchased_at'=> now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id'=> 7,
                'user_id'=>3,
                'purchased_at'=> now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id'=> 8,
                'user_id'=>3,
                'purchased_at'=> now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
