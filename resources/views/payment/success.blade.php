@extends('layouts.navthree')

@section('title', 'Payment Successful')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">Payment Successful!</h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                         <i class="lni lni-friendly" style="font-size: 5rem;"></i>
                    </div>
                    <h4 class="text-center mb-4">Your transaction has been completed successfully.</h4>
                    <p class="text-center">Thank you for your purchase. You will be redirected to the payment page shortly.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        window.location.href = "{{ route('cart.checkout') }}";
    }, 8000);  // Redirect after 5 seconds
</script>
@endsection