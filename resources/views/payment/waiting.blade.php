@extends('layouts.navtwo')

@section('title', 'Payment in Progress')

@section('content')
<div class="container">
    <h1>Payment in Progress</h1>
    <p>Please complete the payment on your phone. This page will automatically check the payment status.</p>
    <div id="status-message"></div>
</div>

<script>
function checkPaymentStatus() {
    fetch('/check-payment-status')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'completed') {
                document.getElementById('status-message').innerHTML = '<div class="alert alert-success">Payment completed successfully!</div>';
                setTimeout(() => window.location.href = '/payment-success', 2000);
            } else if (data.status === 'failed') {
                document.getElementById('status-message').innerHTML = '<div class="alert alert-danger">Payment failed. Please try again.</div>';
                setTimeout(() => window.location.href = '/cart', 2000);
            } else {
                setTimeout(checkPaymentStatus, 4000);
            }
        });
}

checkPaymentStatus();
</script>
@endsection