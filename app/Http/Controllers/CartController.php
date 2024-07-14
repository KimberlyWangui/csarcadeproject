<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Cart;

class CartController extends Controller
{
    public function showGameCartTable()
    {
        $cartItems = Cart::where('userid', Auth::id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function addGameToCart($id)
    {
        $user = Auth::user();
        $game = Game::find($id);
        
        if (!$game) {
            return response()->json(['message' => 'Game not found', 'status' => 'error'], 404);
        }
        
        $cart = Cart::where('userid', $user->id)->where('game_id', $id)->first();
        
        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            Cart::create([
                'userid' => $user->id,
                'game_id' => $game->game_id,
                'game_name' => $game->name,
                'video_path' => $game->video_path,
                'quantity' => 0,
            ]);
        }
        
        return response()->json([
            'message' => 'Game added to cart successfully!',
            'status' => 'success',
            
        ]);
    }

    public function removeGameCartItem(Request $request)
    {
        if ($request->id) {
            $cart = Cart::where('userid', Auth::id())->where('game_id', $request->id)->first();
            if ($cart) {
                $cart->delete();
                session()->flash('success', 'Game removed successfully');
            }
        }
        return redirect()->back();
    }

    public function clearGameCart()
    {
        Cart::where('userid', Auth::id())->delete();
        return redirect()->back()->with('success', 'Game cart cleared successfully');
    }

    public function showGamesForCart()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }
}