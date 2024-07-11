@extends('layouts.navtwo')

@section('title', 'Buy tickets')

@section('content')
    <div class="container mt-5">

      
        <h2>PICK YOUR PREFERRED DATE:</h2>
        <div class="date-picker">
            <input type="text" class="selected-date" readonly>
            <div id="calendar"><i class="lnil lnil-calendar-alt"></i></div>
        </div>

          
        <!-- Centered Heading -->
        <div class="row justify-content-center">
            <div class="col-md-8 text-center text-white">
                <h3 class="mb-4">GET YOUR TICKETS BELOW!!!</h3>
            </div>
        </div>

       

@foreach ($tickets as $ticket)
<div class="col-md-3 mb-4">
    <div class="card ticket-card">
        <div class="card-body d-flex flex-column">
            <div>
                <h5 class="card-title">{{ $ticket['ticket_type'] }}</h5>
                <p class="card-text">{{ $ticket->description }}</p>
            </div>
            <div class="mt-auto">
                <p class="font-weight-bold">Price: {{ $ticket->price }} KSH</p>
                <div class="quantity-selector d-flex align-items-center">
                    <button class="quantity-btn minus btn btn-outline-secondary" data-id="{{ $ticket->id }}">-</button>
                    <input type="number" id="quantity{{ $ticket->id }}" class="quantity-input form-control mx-2 text-center" value="1" min="1" max="10" style="width: 60px;">
                    <button class="quantity-btn plus btn btn-outline-secondary" data-id="{{ $ticket->id }}">+</button>
                </div>
                <a href="{{ route('cart.add', $ticket->id) }}" class="btn btn-primary mt-2 w-100 add-to-cart" data-ticket-type="{{ $ticket->ticket_type }}">Add to Cart</a>
                                
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
                            <video src="{{ asset('assets/images/promo.mp4') }}" class="img-fluid" autoplay muted
                                loop></video>
                        </div>
                        <p class="card-text">Enter your promotional code:</p>
                        <div class="input-group mb-3">
                            <input type="text" id="promo-code" class="form-control" placeholder="Enter code"
                                aria-label="Enter code" aria-describedby="apply-code-button">
                        </div>
                        <button class="btn btn-primary mt-3 apply-promo-code">Apply</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Spacer -->
        <div class="row mt-5"></div>

        <div class="proceed-to-tickets">
           
            <a href="{{ route('cart.show') }}" class="btn-view-cart">Guest Cart</a>
        </div>

        <!-- Proceed Button Section -->
        <div class="row justify-content-center">
           
        <div class="col-md-4 text-center text-white">
            <h5>Once you are done, click below to proceed</h5>
            
            <a href="{{ route('cart.checkout') }}" class="btn-view-cart">Proceed </a>
        </div>
    </div>
        <!-- Bottom Spacer -->
        <div class="row mt-5"></div>

        
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('scripts')

    <script src="{{ asset('assets/js/tickets.js') }}"></script>
    
@endsection
