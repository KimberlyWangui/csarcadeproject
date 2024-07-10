<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameTicketSeeder extends Seeder
{
    public function run()
    {
        DB::table('game_ticket')->insert([
            ['game_id' => 4, 'ticket_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 4, 'ticket_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 5, 'ticket_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            // Add more game_ticket entries as needed
        ]);
    }
}
