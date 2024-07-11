@extends('layouts.navtwo')

@section('title', 'Your Game Cart')

@section('content')
<div class="container">
    <h1>Your Game Cart</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(empty(session('game_cart')))
        <p>Your game cart is empty.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Game Name</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('game_cart') as $id => $details)
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>
                            <form action="{{ route('game.cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('game.cart.clear') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-warning">Clear Game Cart</button>
        </form>
    @endif
</div>

<div class="cart-actions">
    <a href="{{ route('buy.tickets') }}" class="btn btn-proceed">Proceed to Tickets</a>
    <a href="{{ route('games.dispGames') }}" class="btn btn-continue-shopping">Continue Shopping</a>
</div>
@endsection