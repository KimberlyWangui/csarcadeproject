<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Game; // Make sure you import your Game model

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch some users (assuming you have a User model)
        $users = DB::table('users')->take(10)->get();

        // Fetch games
        $games = Game::all();

        // Seed the carts table
        foreach ($users as $user) {
            foreach ($games as $game) {
                DB::table('carts')->insert([
                    'userid' => $user->userid,
                    'game_id' => $game->game_id,
                    'game_name' => $game->name,
                    'video_path' => $game->video_path,
                    'quantity' => rand(1, 5), // Random quantity for variety
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

