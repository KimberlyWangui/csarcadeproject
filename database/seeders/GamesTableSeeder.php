<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Game;
class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::create([
            'name' => 'Space Adventure',
            'description' => 'Fight alien monsters and save earth from abduction.',
            'video_path' => '/storage/games/video1.mp4',
        ]);

        Game::create([
            'name' => 'Sample Game 2',
            'description' => 'Another sample game description.',
            'video_path' => '/storage/games/sample2.mp4',
        ]);
    }
    }
