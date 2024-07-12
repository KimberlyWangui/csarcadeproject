<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use App\Services\MpesaService;
use Illuminate\Support\Facades\Log;
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
                    'total_amount' => \DB::raw('quantity * ' . $ticket->price)
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
    $request->validate([
        'phone_number' => 'required|regex:/^254\d{9}$/',
    ]);

    $cartItems = $this->getCartItems();
    $totalAmount = $this->calculateTotalAmount($cartItems);

    $mpesaService = new MpesaService();
    $response = $mpesaService->stkPush(
        $request->phone_number,
        $totalAmount,
        'TICKET' . time()
    );

    if (isset($response['ResponseCode']) && $response['ResponseCode'] == "0") {
        session(['mpesa_checkout_request_id' => $response['CheckoutRequestID']]);
        return redirect()->route('payment.waiting')->with('success', 'Please complete the payment on your phone.');
    } else {
        Log::error('M-Pesa Payment Initiation Failed', ['response' => $response]);
        return back()->with('error', 'Failed to initiate payment. Please try again. Error: ' . ($response['errorMessage'] ?? 'Unknown error'));
    }
}
       
    
        public function waitForPayment()
        {
            return view('payment.waiting');
        }
    
        public function confirmPayment(Request $request)
        {
            // This method will be called by the M-Pesa API
            // Implement the logic to confirm the payment and update your database
        }
    
        public function checkPaymentStatus()
        {
            // TODO: Implement logic to check payment status
            // This could involve checking your database or making an API call to M-Pesa
            
            // For now, we'll just return a random status
            $statuses = ['pending', 'completed', 'failed'];
            $status = $statuses[array_rand($statuses)];
            
            return response()->json(['status' => $status]);
        }
    }
