<!-- resources/views/games/index.blade.php -->
@extends('layouts.navtwo')

@section('content')
    <h1>Games List</h1>

    <a href="{{ route('games.create') }}" class="btn btn-primary mb-3">Create New Game</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Video Path</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($games as $game)
            <tr>
                <td>{{ $game->name }}</td>
                <td>{{ $game->video_path }}</td>
                <td>{{ $game->description }}</td>
                <td>{{ $game->created_at->format('M d, Y H:i:s') }}</td>
                <td>
                    <a href="{{ route('games.show', $game) }}" class="btn btn-info">View</a>
                    <a href="{{ route('games.edit', $game) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('games.destroy', $game) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this game?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
