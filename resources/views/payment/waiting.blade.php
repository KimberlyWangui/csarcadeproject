@extends('layouts.navthree')

@section('content')
<div class="container">
    <div class="row mt-3"></div>
    <h2>Payment Processing</h2>
    <p>Please complete the payment on your phone. We'll update this page once the payment is confirmed.</p>
    <div id="payment-status"></div>
</div>

<script>
function checkPaymentStatus() {
    fetch('{{ route("payment.check-status") }}', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'completed') {
            document.getElementById('payment-status').innerHTML = '<p class="text-success">Payment completed successfully!</p>';
            setTimeout(() => window.location.href = '{{ route("payment.success") }}', 2000);
        } else if (data.status === 'failed') {
            document.getElementById('payment-status').innerHTML = '<p class="text-danger">Payment failed: ' + data.message + '</p>';
            setTimeout(() => window.location.href = '{{ route("payment.failed") }}', 2000);
        } else {
            document.getElementById('payment-status').innerHTML = '<p class="text-info">Payment pending. Please wait...</p>';
            setTimeout(checkPaymentStatus, 5000);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Payment did not go through, please try again.');
        setTimeout(() => window.history.back(), 2000);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    checkPaymentStatus();
});
</script>
@endsection
