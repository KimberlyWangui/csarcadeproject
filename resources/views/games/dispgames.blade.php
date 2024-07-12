@extends('layouts.navtwo')

@section('title', 'Display Games')

@section('content')
<div class="container5">
    <div id="slide">
        @foreach($games as $index => $game)
        <div class="itemz" id="itemz-{{ $game->game_id }}">
            <video src="{{ asset($game->video_path) }}"></video>
            <div class="content" id="content-{{ $game->game_id }}">
                <div class="name">{{ $game->name }}</div>
                <div class="des">{{ $game->description }}</div>
                <button class="see-more" data-game-id="{{ $game->game_id }}">See more</button>
            </div>
            <div class="additional-content" id="additional-content-{{ $game->game_id }}">
                <div class="more-details">If you would like to add {{ $game->name }} to cart, please click the button below.</div>
                
                <button class="add-to-cart" data-game-id="{{ $game->game_id }}">
                    Add to Cart <i class="lni lni-cart"></i>
                </button>
                
                <button class="go-back" data-game-id="{{ $game->game_id }}">Go Back</button>
            </div>
        </div>
        @endforeach
    </div>
    <div class="buttons5">
        <button id="prev"><i class="lni lni-angle-double-left"></i></button>
        <button id="next"><i class="lni lni-angle-double-right"></i></button>
    </div>
</div>

<div class="proceed-to-tickets">
    <a href="{{ route('buy.tickets') }}" class="btn-proceed" id="proceed-to-tickets">Proceed to Tickets</a>
    <a href="{{ route('game.cart.show') }}" class="btn-view-cart">View Cart</a>
</div>

<div class="row mt-3"></div>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('/assets/js/games.js') }}"></script>
@endsection