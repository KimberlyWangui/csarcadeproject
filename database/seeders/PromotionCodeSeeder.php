<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PromotionCode;

class PromotionCodeSeeder extends Seeder
{
    public function run()
    {
        PromotionCode::create([
            'code' => 'FIRST20',
            'discount_percentage' => 20,
            'first_time_only' => true,
            'minimum_cart_value' => 4000
        ]);
        PromotionCode::create([
            'code' => 'LAST20',
            'discount_percentage' => 20,
            'first_time_only' => true,
            'minimum_cart_value' => 5000
        ]);
        PromotionCode::create([
            'code' => 'XYZ20_',
            'discount_percentage' => 20,
            'first_time_only' => true,
            'minimum_cart_value' => 3500
        ]);
    }
}
