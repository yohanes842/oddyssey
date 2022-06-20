<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'game_id' => 1,
                'user_id'=>1,
                'description'=>'Elden Ring is the most accessible Souls game to date, but it’s still incredibly difficult. You will likely die repeatedly, sometimes in ways that don’t feel entirely fair. If you’re prone to rage throws, this is definitely one to avoid.',
                'review_type'=>'recommended',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id' => 2,
                'user_id'=>1,
                'description'=>'Back 4 Blood takes the fundamental cooperative gameplay that made Left 4 Dead so iconic to the next level, adding more developed gunplay and a stellar deck system that makes every campaign run feel fresh and distinctly challenging',
                'review_type'=>'recommended',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id' => 3,
                'user_id'=>1,
                'description'=>'Elden Ring is a fantastic RPG for any hardcore gamer looking for a new world to explore. Combat is weighty and takes place in a wonderfully intriguing world full of dungeons to explore and monsters to battle. The only downside is that its high difficulty will be a stumbling block that will continue to put some players off, despite the improved accessibility that comes with the open-world format.',
                'review_type'=>'recommended',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id' => 3,
                'user_id'=>2,
                'description'=>'This is the best action RPG game I have ever played',
                'review_type'=>'recommended',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id' => 4,
                'user_id'=>2,
                'description'=>'Featuring the Souls’ series iconic, weighty combat, with the added bonus of new open-world exploration and a more developed narrative Elden Ring is a brilliant adventure for any hardcore RPG fan looking for a challenge.',
                'review_type'=>'recommended',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id' => 5,
                'user_id'=>1,
                'description'=>'The single-player mode is not well optimised and does not gel with the game’s most interesting systems, creating a compromised experience that is best avoided',
                'review_type'=>'not',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id' => 5,
                'user_id'=>3,
                'description'=>'This game is so interesting and fun. I can\'t stop playing.....',
                'review_type'=>'recommended',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
