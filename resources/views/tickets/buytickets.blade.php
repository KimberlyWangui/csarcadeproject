@extends('layouts.navtwo')

@section('title', 'Buy tickets')

@section('content')
<div class="container mt-5">
    <!-- Centered Heading -->
    <div class="row justify-content-center">
        <div class="col-md-8 text-center text-white">
            <h2 class="mb-4"><b>GET YOUR TICKETS BELOW!!!</b></h2>
        </div>
    </div>

    <div class="row">
        @php
            $tickets = [
                [
                    'video' => 'kids.mp4',
                    'title' => 'Child Ticket',
                    'description' => 'Package of 7 games per hour and 50 points awarded to those with an account.',
                    'price' => '700 KSH',
                ],
                [
                    'video' => 'grown.mp4',
                    'title' => 'Adult Ticket',
                    'description' => 'Package of 7 games per hour and 70 points awarded to those with an account.',
                    'price' => '900 KSH',
                ],
                [
                    'video' => 'fam.mp4',
                    'title' => 'Family Package',
                    'description' => 'Package of 12 games per hour and 150 points awarded to those with an account.',
                    'price' => '1500 KSH',
                ],
                [
                    'video' => 'groupz.mp4',
                    'title' => 'Group package',
                    'description' => 'Package of 10 games per hour and 130 points awarded to those with an account.',
                    'price' => '1300 KSH',
                ],
            ];
        @endphp

        @foreach ($tickets as $index => $ticket)
        <div class="col-md-3 mb-4">
            <div class="card ticket-card">
                <div class="card-img-container">
                    <video src="{{ asset('assets/images/' . $ticket['video']) }}" class="card-img-top" autoplay muted loop></video>
                </div>
                <div class="card-body d-flex flex-column">
                    <div>
                        <h5 class="card-title">{{ $ticket['title'] }}</h5>
                        <p class="card-text">{{ $ticket['description'] }}</p>
                    </div>
                    <div class="mt-auto">
                        <p class="font-weight-bold">Price: {{ $ticket['price'] }}</p>
                        <div class="quantity-selector d-flex align-items-center">
                            <button class="quantity-btn minus btn btn-outline-secondary" data-id="{{ $index }}"> - </button>
                            <input type="number" id="quantity{{ $index }}" class="quantity-input form-control mx-2 text-center" value="1" min="1" max="10" style="width: 60px;">
                            <button class="quantity-btn plus btn btn-outline-secondary" data-id="{{ $index }}">+</button>
                        </div>
                        <a href="#" class="btn btn-primary mt-2 w-100 add-to-cart">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Notice Card -->
    <div class="row mt-4 justify-content-center">
        <div class="col-md-10">
            <div class="card bg text-dark">
                <div class="card-body text-center">
                    <h4 class="card-title">POLITE NOTICE</h4>
                    <p class="card-text">For the group packages, the games are per group, and <b>NOT</b> per person.</p>
                </div>
            </div>
        </div>
    </div>

   <!-- Promotional Code Section -->
<div class="row mt-5 justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">Promotional Code</h4>
                <div class="video-placeholder">
                    <video src="{{ asset('assets/images/promo.mp4') }}" class="img-fluid" autoplay muted loop></video>
                </div>
                <p class="card-text">Enter your promotional code:</p>
                <div class="input-group mb-3">
                    <input type="text" id="promo-code" class="form-control" placeholder="Enter code" aria-label="Enter code" aria-describedby="apply-code-button">
                </div>
                <button class="btn btn-primary mt-3 apply-promo-code">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- Spacer -->
<div class="row mt-5"></div>

<!-- Proceed Button Section -->
<div class="row justify-content-center">
    <div class="col-md-4 text-center text-white">
        <h5>Once you are done, click below to proceed</h5>
        <button class="btn btn-success proceed-btn mt-3">Proceed <strong>>></strong></button>
    </div>
</div>

<!-- Bottom Spacer -->
<div class="row mt-5"></div>

    <!-- Checkout Form Section (Hidden by default) -->
    <div class="row mt-5 justify-content-center checkout-section" style="display: none;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Checkout Details</h4>
                    <div id="selected-tickets"></div>
                    <hr>
                    <div id="promo-code-result"></div>
                    <hr>
                    <h5>Total Amount: <span id="total-amount"></span></h5>
                    <form id="checkout-form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirm Purchase</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- JavaScript Section -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let selectedTickets = @json($tickets); // Pass PHP array to JavaScript

    // Function to update selected tickets view
    function updateSelectedTicketsView() {
        let html = '<h5>Selected Tickets:</h5>';
        html += '<ul>';
        selectedTickets.forEach(ticket => {
            html += `<li>${ticket.title} - Quantity: ${ticket.quantity} - Total Price: ${ticket.totalPrice}</li>`;
        });
        html += '</ul>';
        $('#selected-tickets').html(html);
    }

    // Function to calculate total amount
    function calculateTotalAmount() {
        let total = 0;
        selectedTickets.forEach(ticket => {
            total += parseFloat(ticket.totalPrice);
        });
        $('#total-amount').text(`KSH ${total}`);
    }

    // Document ready function
    $(document).ready(function () {
        // Add to cart button click event
        $('.add-to-cart').click(function(e) {
            e.preventDefault();
            let index = $(this).closest('.col-md-3').index();
            let quantity = parseInt($(`#quantity${index}`).val());
            selectedTickets[index].quantity = quantity;
            selectedTickets[index].totalPrice = parseInt(selectedTickets[index].price) * quantity;
            updateSelectedTicketsView();
            calculateTotalAmount();
        });

        // Apply promo code button click event
        $('.apply-promo-code').click(function(e) {
            e.preventDefault();
            let promoCode = $('#promo-code').val();
            // Perform validation and apply promo code logic here (not implemented in this example)
            // Simulating promo code validation result
            $('#promo-code-result').html(`<p>Promo code <strong>${promoCode}</strong> applied successfully!</p>`);
        });

        // Proceed button click event
        $('.proceed-btn').click(function(e) {
            e.preventDefault();
            console.log('Proceed button clicked');
            $('.checkout-section').show();
            $('html, body').animate({
                scrollTop: $('.checkout-section').offset().top
            }, 1000);
        });

        // Form submission event
        $('#checkout-form').submit(function(e) {
            e.preventDefault();
            // Handle form submission logic here (not implemented in this example)
            alert('Form submitted!');
        });
    });
</script>

@endsection
