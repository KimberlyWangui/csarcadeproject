<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\GamesTableSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Add this line to call the GamesTableSeeder
        $this->call(GamesTableSeeder::class);
        $this->call(CartSeeder::class);
        
        $this->call(GameTicketSeeder::class);   
        $this->call(PromotionCodeSeeder::class);  
            
      
    }
}