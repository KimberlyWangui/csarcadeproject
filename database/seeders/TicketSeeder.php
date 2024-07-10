<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    public function run()
    {
        DB::table('tickets')->insert([
            ['ticket_type' => 'Child ', 'price' => 650, 'description' => 'Catered for children under the age of 12', 'created_at' => now(), 'updated_at' => now()],
            ['ticket_type' => 'Group', 'price' => 1300, 'description' => '3 or more is considered a group, get more for less', 'created_at' => now(), 'updated_at' => now()],
            // Add more tickets as needed
        ]);
    }
}
