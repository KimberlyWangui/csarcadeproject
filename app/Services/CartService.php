<?php

namespace App\Services;

use App\Models\CartItem;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function getCartIdentifier()
    {
        if (Auth::check()) {
            return ['user_id' => Auth::id()];
        } else {
            if (!Session::has('guest_cart_id')) {
                Session::put('guest_cart_id', uniqid('guest_', true));
            }
            return ['session_id' => Session::get('guest_cart_id')];
        }
    }

    public function addToCart($ticketId, $quantity = 1)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $cartIdentifier = $this->getCartIdentifier();

        $cartItem = CartItem::updateOrCreate(
            array_merge($cartIdentifier, ['ticket_id' => $ticketId]),
            [
                'quantity' => \DB::raw("quantity + $quantity"),
                'price' => $ticket->price,
            ]
        );

        return $cartItem;
    }

    public function getCartItems()
    {
        $cartIdentifier = $this->getCartIdentifier();
        return CartItem::where($cartIdentifier)->with('ticket')->get();
    }

    public function removeCartItem($cartItemId)
    {
        $cartIdentifier = $this->getCartIdentifier();
        return CartItem::where($cartIdentifier)->where('id', $cartItemId)->delete();
    }

    public function clearCart()
    {
        $cartIdentifier = $this->getCartIdentifier();
        return CartItem::where($cartIdentifier)->delete();
    }

    public function updateQuantity($cartItemId, $quantity)
    {
        $cartIdentifier = $this->getCartIdentifier();
        $cartItem = CartItem::where($cartIdentifier)->where('id', $cartItemId)->first();
        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
            return true;
        }
        return false;
    }

    public function transferGuestCart()
    {
        if (Auth::check() && Session::has('guest_cart_id')) {
            $guestSessionId = Session::get('guest_cart_id');
            CartItem::where('session_id', $guestSessionId)
                ->update(['user_id' => Auth::id(), 'session_id' => null]);
            Session::forget('guest_cart_id');
        }
    }
}