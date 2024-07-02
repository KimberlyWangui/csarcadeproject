@extends('layouts.navtwo')

@section('content')
    <h1>Game Details</h1>

    <div>
        <p><strong>Name:</strong> {{ $game->name }}</p>
        <p><strong>Video Path:</strong> {{ $game->video_path }}</p>
        <p><strong>Description:</strong> {{ $game->description }}</p>
        <p><strong>Created At:</strong> {{ $game->created_at->format('M d, Y H:i:s') }}</p>
    </div>

    <a href="{{ route('games.index') }}" class="btn btn-primary">Back to Games List</a>
@endsection
