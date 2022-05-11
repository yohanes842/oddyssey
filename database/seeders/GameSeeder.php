<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'title' => 'Apex Legends',
            'description' => 'haha',
            'price' => 0,
            'image' => 'Apex Legends-img',
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Back 4 Blood',
            'description' => 'haha',
            'price' => 699000,
            'image' => 'Back 4 Blood-img',
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Elden Ring',
            'description' => 'haha',
            'price' => 599000,
            'image' => 'Elden Ring-img',
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'FIFA 22',
            'description' => 'haha',
            'price' => 659000,
            'image' => 'FIFA 22-img',
            'category_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'For Honor',
            'description' => 'haha',
            'price' => 149000,
            'image' => 'For Honor-img',
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Forza Horizon 5',
            'description' => 'haha',
            'price' => 699000,
            'image' => 'Forza Horizon 5-img',
            'category_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'God of War',
            'description' => 'haha',
            'price' => 729000,
            'image' => 'God of War-img',
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Guilty Gear Strive',
            'description' => 'haha',
            'price' => 749000,
            'image' => 'Guilty Gear Strive-img',
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'NBA 2K22',
            'description' => 'haha',
            'price' => 659000,
            'image' => 'NBA 2K22-img',
            'category_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Rainbow Six:Siege',
            'description' => 'haha',
            'price' => 259000,
            'image' => 'Rainbow Six:Siege-img',
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Red Dead Redemption 2',
            'description' => 'haha',
            'price' => 640000,
            'image' => 'Red Dead Redemption 2-img',
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Sekiro: Shadows Die Twice',
            'description' => 'haha',
            'price' => 729000,
            'image' => 'Sekiro: Shadows Die Twice-img',
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'The Elder Scrolls V: Skyrim',
            'description' => 'haha',
            'price' => 329000,
            'image' => 'The Elder Scrolls V: Skyrim-img',
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Soulcalibur VI',
            'description' => 'haha',
            'price' => 550000,
            'image' => 'Soulcalibur VI-img',
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Street Fighter V',
            'description' => 'haha',
            'price' => 159000,
            'image' => 'Street Fighter V-img',
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
