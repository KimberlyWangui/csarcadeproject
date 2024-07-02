@extends('layouts.navtwo')

@section('title', 'Display Games')

@section('content')

    <div class="container5">
        <div id="slide">
            @for ($i = 1; $i <= 18; $i++)
                <div class="itemz" id="itemz-{{ $i }}">
                    <video src="{{ asset('assets/videos/video' . $i . '.mp4') }}"></video>
                    <div class="content" id="content-{{ $i }}">
                        <div class="name">Game {{ $i }}</div>
                        <div class="des">Description for Game {{ $i }}</div>
                        <button class="see-more" data-game-id="{{ $i }}">See more</button>
                    </div>
                    <div class="additional-content" id="additional-content-{{ $i }}">
                        <div class="more-details">More details about Game {{ $i }}</div>
                        <button class="add-to-cart">Add to Cart</button>
                        <button class="go-back" data-game-id="{{ $i }}">Go Back</button>
                    </div>
                </div>
            @endfor
        </div>
        <div class="buttons5">
            <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
            <button id="next"><i class="fa-solid fa-angle-right"></i></button>
        </div>
    </div>

    <script src="{{ asset('/assets/js/games.js') }}"></script>
@endsection
