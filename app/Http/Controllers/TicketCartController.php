<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketCartController extends Controller
{
    public function addToCart($id)
    {
        $ticket = Ticket::find($id);
        if (!$ticket) {
            abort(404);
        }
    
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            $cart[$id]['total_price'] = $cart[$id]['quantity'] * $cart[$id]['price'];
        } else {
            $cart[$id] = [
                "ticket_type" => $ticket->ticket_type,
                
                "quantity" => 1,
                "price" => $ticket->price,
                "description" => $ticket->description,
                "total_price" => $ticket->price
            ];
        }
    
        session()->put('cart', $cart);
    
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Ticket added to cart successfully!']);
        }
    
        return redirect()->back()->with('success', 'Ticket added to cart successfully!');
    }
    
    public function showCartTable()
    {
        $cartItems = session()->get('cart', []);
        return view('cart.tickets', compact('cartItems'));
    }

    

    public function removeCartItem(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart', []);
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Ticket removed successfully');
        }
        return redirect()->back();
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared successfully');
    }

    public function showTickets()
    {
        $tickets = Ticket::all();
        return view('tickets.buytickets', compact('tickets'));
    }

    public function updateQuantity(Request $request)
    {
        $id = $request->id;
        $quantity = $request->quantity;

        if ($id && $quantity) {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
                $cart[$id]['total_price'] = $quantity * $cart[$id]['price'];
                session()->put('cart', $cart);
                return response()->json(['success' => true]);
            }
        }
        return response()->json(['success' => false]);
    }
    public function showCheckout()
    {
        $cartItems = session()->get('cart', []);
        return view('payment.pay', compact('cartItems'));
    }

    public function processPayment(Request $request)
{
    // Handle payment processing logic here
    // After successful payment, clear the cart and redirect to a confirmation page
    session()->forget('cart');
    return redirect()->route('payment.confirmation')->with('success', 'Payment processed successfully!');
}
}