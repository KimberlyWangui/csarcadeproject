@extends('layouts.navtwo')

@section('title', 'Your Ticket Cart')

@section('content')
<div class="container">
    <h1>Your Cart</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(empty($cartItems))
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
                @foreach($cartItems as $id => $item)
                    <tr>
                        <td>{{ $item['ticket_type'] }}</td>
                        <td>{{ $item['quantity'] }}</td> <!-- Display the quantity directly -->
                        <td>{{ $item['price'] }} KSH</td>
                        <td class="item-total">{{ $item['total_price'] }} KSH</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
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

@section('scripts')
<script>
$(document).ready(function() {
    $('.quantity-input').change(function() {
        var id = $(this).data('id');
        var quantity = $(this).val();
        
        $.ajax({
            url: '{{ route("cart.update") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                quantity: quantity
            },
            success: function(response) {
                if(response.success) {
                    location.reload();
                }
            }
        });
    });
});
</script>
@endsection
