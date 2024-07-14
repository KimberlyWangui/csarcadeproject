@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Payment Processing</h2>
    <p>Please complete the payment on your phone. We'll update this page once the payment is confirmed.</p>
    <div id="payment-status"></div>
</div>

<script>
function checkPaymentStatus() {
    fetch('{{ route("payment.check-status") }}')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'completed') {
                document.getElementById('payment-status').innerHTML = '<p class="text-success">Payment completed successfully!</p>';
                setTimeout(() => window.location.href = '{{ route("payment.success") }}', 2000);
            } else if (data.status === 'failed') {
                document.getElementById('payment-status').innerHTML = '<p class="text-danger">Payment failed. Please try again.</p>';
                setTimeout(() => window.location.href = '{{ route("payment.failed") }}', 2000);
            } else {
                setTimeout(checkPaymentStatus, 3000);
            }
        });
}

checkPaymentStatus();
</script>
@endsection