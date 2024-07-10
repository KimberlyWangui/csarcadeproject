<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function apply(Request $request)
    {
        $promoCode = $request->input('code');
        // Replace with your promo code logic
        if ($promoCode === 'PROMO2024') {
            return response()->json(['success' => true, 'discount' => 200]);
        }
        return response()->json(['success' => false]);
    }
}