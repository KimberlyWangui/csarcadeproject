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
                    <p>Secure and convenient payment via M-Pesa</p>
                </div>
            </div>
            <div class="mb-4">
                <a href="{{ route('cart.show') }}" class="btn-proceed cancel-order-btn" id="proceed-to-tickets">Cancel Order</a>
            </div>
        </div>

        <!-- Middle Section: M-Pesa Payment Form -->
        <div class="col-md-4 border-right d-flex flex-column justify-content-between">
            <div>
                <div class="text-center mb-4">
                    <img src="{{ asset('assets/images/mpesa.png') }}" alt="M-Pesa Icon" style="width: 100px;">
                </div>
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('cart.process-payment') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="phone_number">Phone Number (254XXXXXXXXX)</label>
                        <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" required pattern="254\d{9}" value="{{ old('phone_number') }}">
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="amount">Amount (KSH)</label>
                        <input type="text" class="form-control" id="amount" name="amount" value="{{ $finalTotal }}" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Pay Now</button>
                </form>
            </div>
        </div>

        <!-- Right Section: Order Information -->
        <div class="col-md-4 d-flex flex-column justify-content-between">
            <div>
                <h3>Order Information</h3>
                <div class="mt-3">
                    @foreach($cartItems as $item)
                        <div class="mb-2">
                            <strong>{{ $item['ticket_type'] }}</strong><br>
                            {{ $item['quantity'] }} x KSH{{ $item['price'] }} = KSH{{ $item['total_amount'] }}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-3 pt-2 border-top">
                <p>Subtotal: KSH{{ $totalAmount }}</p>
                @if($discountAmount > 0)
                    <p>Discount: KSH{{ $discountAmount }}</p>
                @endif
                <strong>Total: KSH<span id="total-amount">{{ $finalTotal }}</span></strong>
            </div>
            <!-- Promotion code form -->
            <div class="promo-code-form mt-3">
                <input type="text" id="promo-code" class="form-control" placeholder="Enter promo code">
                <button class="btn btn-secondary mt-2 apply-promo-code">Apply</button>
              
                <div id="promo-code-result" class="mt-2"></div>

            </div>
        </div>

    </div>

    <div class="row mt-3"></div>
    <div class="proceed-to-tickets">
        <a href="{{ route('buy.tickets') }}" class="btn-proceed" id="proceed-to-tickets">Back to Tickets</a>
        <div class="row mt-3"></div>
        <form action="{{ route('cart.clear') }}" method="POST" id="clear-cart-form">
            @csrf
            <button type="submit" class="btn btn-warning clear-cart-btn">Clear Cart</button>
        </form>
    </div>
    <div class="row mt-3"></div>

</div>

<style>
    .border-right {
        border-right: 1px solid #dee2e6;
    }
    .payment-form {
        min-height: 400px; /* Adjust this value to make the form longer if needed */
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const applyPromoCodeBtn = document.querySelector('.apply-promo-code');
    if (applyPromoCodeBtn) {
        applyPromoCodeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const promoCode = document.getElementById('promo-code').value;
            
            fetch('{{ route("cart.apply-promo") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ promo_code: promoCode })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('promo-code-result').innerHTML = `
                        <p class="text-success">Promo code applied successfully!</p>
                        <p>Discount: KSH${data.discount_amount}</p>
                    `;
                    document.getElementById('total-amount').textContent = data.new_total;
                    document.getElementById('amount').value = data.new_total;
                } else {
                    document.getElementById('promo-code-result').innerHTML = `
                        <p class="text-danger">${data.error}</p>
                    `;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('promo-code-result').innerHTML = `
                    <p class="text-danger">An error occurred. Please try again.</p>
                `;
            });
        });
    }

    const clearCartBtn = document.querySelector('.clear-cart-btn');
    const cancelOrderBtn = document.querySelector('.cancel-order-btn');

    clearCartBtn.addEventListener('click', function(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to clear the cart?')) {
            document.getElementById('clear-cart-form').submit();
        }
    });

    cancelOrderBtn.addEventListener('click', function(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to cancel the order?')) {
            window.location.href = cancelOrderBtn.getAttribute('href');
        }
    });
});
</script>
@endsection
