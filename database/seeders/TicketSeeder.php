<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    public function run()
    {
        DB::table('tickets')->insert([
            [
                'ticket_type' => 'Child Ticket',
                'price' => 700,
                'description' => 'Package of 8 games per hour and 50 points awarded to those with an account.',
                'video' => 'kids.mp4',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'ticket_type' => 'Adult Ticket',
                'price' => 850,
                'description' => 'Package of 9 games per hour and 90 points awarded to those with an account.',
                'video' => 'grown.mp4',
                'created_at' => now(),
                'updated_at' => now()
            ], 
             [
                'ticket_type' => 'Family Package',
                'price' => 1500,
                'description' => 'Package of 15 games per hour and 150 points awarded to those with an account.',
                'video' => 'fam.mp4',
                'created_at' => now(),
                'updated_at' => now()
             ],
             [
                'ticket_type' => 'Group Package',
                'price' => 1250,
                'description' => 'Package of 13 games per hour and 130 points awarded to those with an account.',
                'video' => 'groupz.mp4',
                'created_at' => now(),
                'updated_at' => now()
            ]
            // Add more tickets as needed
        ]);
    }
}
