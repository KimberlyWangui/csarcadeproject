@extends('layouts.navtwo')

@section('title', 'Payment')

@section('content')
<div class="container mt-5">
    <div class="row bg-white p-4 rounded shadow payment-form">
        <!-- Left Section: Payment Method -->
        <div class="col-md-4 border-right d-flex flex-column justify-content-between">
            <div>
                <h3>Payment Method</h3>
                <div class="mt-3">
                    <h6>Payment by M-Pesa</h6>
                </div>
            </div>
            <div class="mb-4">
                <p>Secure and convenient payment via M-Pesa</p>
            </div>
        </div>

        <!-- Middle Section: M-Pesa Payment Form -->
        <div class="col-md-4 border-right d-flex flex-column justify-content-between">
            <div>
                <div class="text-center mb-4">
                    <img src="{{ asset('assets/images/mpesa.png') }}" alt="M-Pesa Icon" style="width: 100px;">
                </div>
                <form action="{{ route('cart.process-payment') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                    </div>
                    <div class="form-group mt-4">
                        <label for="amount">Amount (KSH)</label>
                        <input type="text" class="form-control" id="amount" name="amount" value="{{ array_sum(array_column($cartItems, 'total_price')) }}" readonly>
                    </div>
                </form>
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Pay Now</button>
            </div>
        </div>

        <!-- Right Section: Order Information -->
        <div class="col-md-4 d-flex flex-column justify-content-between">
            <div>
                <h3>Order Information</h3>
                <div class="mt-3">
                    @foreach($cartItems as $id => $details)
                        <div class="mb-2">
                            <strong>{{ $details['ticket_type'] }}</strong><br>
                            {{ $details['quantity'] }} x KSH{{ $details['price'] }} = KSH{{ $details['quantity'] * $details['price'] }}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-3 pt-2 border-top">
                <strong>Total: KSH{{ array_sum(array_column($cartItems, 'total_price')) }}</strong>
            </div>
        </div>
    </div>
    <div class="row mt-5"></div>
</div>

<style>
    .border-right {
        border-right: 1px solid #dee2e6;
    }
    .payment-form {
        min-height: 400px; /* Adjust this value to make the form longer */
    }
</style>
@endsection