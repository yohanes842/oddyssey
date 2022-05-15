<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'Action RPG',
            'slug'=> 'action-rpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Shooter',
            'slug'=> 'shooter',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Fighting',
            'slug'=> 'fighting',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Sports & Racing',
            'slug'=> 'sports-&-racing',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Adventure',
            'slug'=> 'adventure',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
