<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class TicketCartController extends Controller
{
    public function addToCart($id)
    {
        $ticket = Ticket::findOrFail($id);
        
        if (Auth::check()) {
            $cartItem = CartItem::updateOrCreate(
                ['user_id' => Auth::id(), 'ticket_id' => $id],
                [
                    'username' => Auth::user()->name,
                    'ticket_type' => $ticket->ticket_type,
                    'quantity' => \DB::raw('quantity + 1'),
                    'ticket_price' => $ticket->price,
                    'total_amount' => \DB::raw('(quantity + 1) * ' . $ticket->price)
                ]
            );
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
                $cart[$id]['total_amount'] = $cart[$id]['quantity'] * $ticket->price;
            } else {
                $cart[$id] = [
                    "id" => $id,
                    "ticket_type" => $ticket->ticket_type,
                    "quantity" => 1,
                    "price" => $ticket->price,
                    "description" => $ticket->description,
                    "total_amount" => $ticket->price
                ];
            }
            session()->put('cart', $cart);
        }

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Ticket added to cart successfully!']);
        }
        return redirect()->back()->with('success', 'Ticket added to cart successfully!');
    }

    public function showCartTable()
    {
        $cartItems = $this->getCartItems();
        $totalAmount = $this->calculateTotalAmount($cartItems);
        return view('cart.tickets', compact('cartItems', 'totalAmount'));
    }

    public function removeCartItem(Request $request)
    {
        $id = $request->id;
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())->where('ticket_id', $id)->delete();
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }
        return redirect()->back()->with('success', 'Ticket removed successfully');
    }

    public function clearCart()
    {
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())->delete();
        } else {
            session()->forget('cart');
        }
        return redirect()->back()->with('success', 'Cart cleared successfully');
    }

    public function updateQuantity(Request $request)
    {
        $id = $request->id;
        $quantity = $request->quantity;

        if ($id && $quantity) {
            if (Auth::check()) {
                $cartItem = CartItem::where('user_id', Auth::id())
                                    ->where('ticket_id', $id)
                                    ->first();
                if ($cartItem) {
                    $cartItem->quantity = $quantity;
                    $cartItem->total_amount = $quantity * $cartItem->ticket_price;
                    $cartItem->save();
                    return response()->json([
                        'success' => true,
                        'total_amount' => $cartItem->total_amount
                    ]);
                }
            } else {
                $cart = session()->get('cart', []);
                if (isset($cart[$id])) {
                    $cart[$id]['quantity'] = $quantity;
                    $cart[$id]['total_amount'] = $quantity * $cart[$id]['price'];
                    session()->put('cart', $cart);
                    return response()->json([
                        'success' => true,
                        'total_amount' => $cart[$id]['total_amount']
                    ]);
                }
            }
        }
        return response()->json(['success' => false]);
    }

    private function getCartItems()
    {
        if (Auth::check()) {
            return CartItem::where('user_id', Auth::id())->with('ticket')->get()->map(function ($item) {
                return [
                    'id' => $item->ticket_id,
                    'ticket_type' => $item->ticket_type,
                    'quantity' => $item->quantity,
                    'price' => $item->ticket_price,
                    'description' => $item->ticket->description,
                    'total_amount' => $item->total_amount
                ];
            })->keyBy('id');
        } else {
            return collect(session()->get('cart', []));
        }
    }

    private function calculateTotalAmount($cartItems)
    {
        return $cartItems->sum('total_amount');
    }

    public function showTickets()
    {
        $tickets = Ticket::all();
        return view('tickets.buytickets', compact('tickets'));
    }

    public function showCheckout()
    {
        $cartItems = $this->getCartItems();
        $totalAmount = $this->calculateTotalAmount($cartItems);
        return view('payment.pay', compact('cartItems', 'totalAmount'));
    }

    public function processPayment(Request $request)
    {
        // Handle payment processing logic here
        // After successful payment, clear the cart and redirect to a confirmation page
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())->delete();
        } else {
            session()->forget('cart');
        }
        return redirect()->route('payment.confirmation')->with('success', 'Payment processed successfully!');
    }
}