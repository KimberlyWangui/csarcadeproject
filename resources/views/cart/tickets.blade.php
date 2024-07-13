@extends('layouts.navthree')

@section('title', 'Your Ticket Cart')

@section('content')
<div class="container">
    <h1>Your Cart</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Ticket Type</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item['ticket_type'] }}</td>
                        <td id="quantity{{ $item['id'] }}">{{ $item['quantity'] }}</td>
                        <td>{{ $item['price'] }} KSH</td>
                        <td class="item-total">{{ $item['total_amount'] }} KSH</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <form action="{{ route('cart.clear') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-warning">Clear Cart</button>
    </form>
</div>

<div class="cart-actions">
    <a href="{{ route('cart.checkout') }}" class="btn btn-proceed">Proceed to Checkout</a>
    <a href="{{ route('tickets.list') }}" class="btn btn-continue-shopping">Continue Shopping</a>
</div>
@endsection