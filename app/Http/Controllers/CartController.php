<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display the cart contents.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showCartTable()
    {
        // Fetch cart items for the authenticated user
        $cartItems = Cart::where('userid', Auth::id())->get();

        return view('cart.index', compact('cartItems'));
    }

    /**
     * Add a game to the cart.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function addToCart($id)
    {
        $user = Auth::user();
        $game = Game::find($id);
        
        if (!$game) {
            return response()->json(['message' => 'Game not found', 'status' => 'error'], 404);
        }
        
        $cart = Cart::where('userid', $user->userid)->where('game_id', $id)->first();
        
        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
            return response()->json([
                'message' => 'Game is already in your cart. Quantity increased!',
                'status' => 'info',
                'quantity' => $cart->quantity
            ]);
        } else {
            Cart::create([
                'userid' => $user->userid,
                'game_id' => $game->game_id,
                'game_name' => $game->name,
                'video_path' => $game->video_path,
                'quantity' => 0,
            ]);
            return response()->json([
                'message' => 'Game added to cart successfully!',
                'status' => 'success',
                'quantity' => 0
            ]);
        }
    }

    /**
     * Remove an item from the cart.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeCartItem(Request $request)
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

    /**
     * Clear the cart.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clearCart()
    {
        Cart::where('userid', Auth::id())->delete();
        return redirect()->back();
    }

    /**
     * Display the list of games.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showGames()
    {
        $games = Game::all();
        return view('games.', compact('games'));
    }
}