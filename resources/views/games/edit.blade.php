@extends('layouts.navtwo')

@section('content')
    <h1>Edit Game</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('games.update', $game) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $game->name }}">
        </div>
        <div class="form-group">
            <label for="video_path">Video Path:</label>
            <input type="text" class="form-control" id="video_path" name="video_path" value="{{ $game->video_path }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description">{{ $game->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Game</button>
    </form>
@endsection
