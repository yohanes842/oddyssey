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
            'description' => 'Apex Legends is the award-winning, free-to-play Hero Shooter from Respawn Entertainment. Master an ever-growing roster of legendary characters with powerful abilities, and experience strategic squad play and innovative gameplay in the next evolution of Hero Shooter and Battle Royale.',
            'price' => 0,
            'image' => 'Apex Legends-img',
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Back 4 Blood',
            'description' => 'Back 4 Blood is a thrilling cooperative first-person shooter from the creators of the critically acclaimed Left 4 Dead franchise. Experience the intense 4 player co-op narrative campaign, competitive multiplayer as human or Ridden, and frenetic gameplay that keeps you in the action.',
            'price' => 699000,
            'image' => 'Back 4 Blood-img',
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'THE NEW FANTASY ACTION RPG. Rise, Tarnished, and be guided by grace to brandish the power of the Elden Ring and become an Elden Lord in the Lands Between.',
            'description' => 'haha',
            'price' => 599000,
            'image' => 'Elden Ring-img',
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'FIFA 22',
            'description' => 'Powered by Football™, EA SPORTS™ FIFA 22 brings the game even closer to the real thing with fundamental gameplay advances and a new season of innovation across every mode.',
            'price' => 659000,
            'image' => 'FIFA 22-img',
            'category_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'For Honor',
            'description' => 'Carve a path of destruction through an intense, believable battlefield in For Honor.',
            'price' => 149000,
            'image' => 'For Honor-img',
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Forza Horizon 5',
            'description' => 'Your Ultimate Horizon Adventure awaits! Explore the vibrant and ever-evolving open world landscapes of Mexico with limitless, fun driving action in hundreds of the world’s greatest cars. Begin Your Horizon Adventure today and add to your Wishlist!',
            'price' => 699000,
            'image' => 'Forza Horizon 5-img',
            'category_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'God of War',
            'description' => 'His vengeance against the Gods of Olympus years behind him, Kratos now lives as a man in the realm of Norse Gods and monsters. It is in this harsh, unforgiving world that he must fight to survive… and teach his son to do the same.',
            'price' => 729000,
            'image' => 'God of War-img',
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Guilty Gear Strive',
            'description' => 'The cutting-edge 2D/3D hybrid graphics pioneered in the Guilty Gear series have been raised to the next level in “GUILTY GEAR -STRIVE-“. The new artistic direction and improved character animations will go beyond anything you’ve seen before in a fighting game!',
            'price' => 749000,
            'image' => 'Guilty Gear Strive-img',
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'NBA 2K22',
            'description' => 'NBA 2K22 puts the entire basketball universe in your hands. Anyone, anywhere can hoop in NBA 2K22.',
            'price' => 659000,
            'image' => 'NBA 2K22-img',
            'category_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Rainbow Siege',
            'description' => 'Rainbow Siege is the latest installment of the acclaimed first-person shooter franchise developed by the renowned Ubisoft Montreal studio.',
            'price' => 259000,
            'image' => 'Rainbow Siege-img',
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Red Dead Redemption 2',
            'description' => 'Winner of over 175 Game of the Year Awards and recipient of over 250 perfect scores, RDR2 is the epic tale of outlaw Arthur Morgan and the infamous Van der Linde gang, on the run across America at the dawn of the modern age. Also includes access to the shared living world of Red Dead Online.',
            'price' => 320000,
            'image' => 'Red Dead Redemption 2-img',
            'category_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Shadows Die Twice',
            'description' => 'Game of the Year - The Game Awards 2019 Best Action Game of 2019 - IGN Carve your own clever path to vengeance in the award winning adventure from developer FromSoftware, creators of Bloodborne and the Dark Souls series. Take Revenge. Restore Your Honor. Kill Ingeniously.',
            'price' => 729000,
            'image' => 'Shadows Die Twice-img',
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'The Elder Scrolls V',
            'description' => 'EPIC FANTASY REBORN The next chapter in the highly anticipated Elder Scrolls saga arrives from the makers of the 2006 and 2008 Games of the Year, Bethesda Game Studios. Skyrim reimagines and revolutionizes the open-world fantasy epic, bringing to life a complete virtual world open for you to explore any way you choose',
            'price' => 135999,
            'image' => 'The Elder Scrolls V-img',
            'category_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Soulcalibur VI',
            'description' => 'Bring more than your fists to the fight! Featuring all-new battle mechanics and characters, SOULCALIBUR VI marks a new era of the historic franchise. Welcome back to the stage of history!',
            'price' => 82500,
            'image' => 'Soulcalibur VI-img',
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('games')->insert([
            'title' => 'Resident Evil 2',
            'description' => 'A deadly virus engulfs the residents of Raccoon City in September of 1998, plunging the city into chaos as flesh eating zombies roam the streets for survivors. An unparalleled adrenaline rush, gripping storyline, and unimaginable horrors await you. Witness the return of Resident Evil 2.',
            'price' => 319999,
            'image' => 'Resident Evil 2-img',
            'category_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
