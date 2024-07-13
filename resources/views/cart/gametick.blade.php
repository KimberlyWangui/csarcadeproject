@extends('layouts.navthree')

@section('content')
<div class="container">
    <h2>Your Cart</h2>
    @if(count($cartItems) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ ucfirst($item->item_type) }}</td>
                    <td>
                        <input type="number" class="form-control quantity-input" 
                               value="{{ $item->quantity }}" min="1" 
                               data-id="{{ $item->id }}">
                    </td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>${{ number_format($item->total_price, 2) }}</td>
                    <td>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <h4>Total: ${{ number_format($cartItems->sum('total_price'), 2) }}</h4>
        </div>
        <div class="mt-3">
            <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
            <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-warning">Clear Cart</button>
            </form>
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection