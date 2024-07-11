@extends('layouts.navtwo')

@section('content')
    <h1>Edit Ticket</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tickets.update', $ticket) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="ticket_type">Ticket Type:</label>
            <input type="text" class="form-control" id="ticket_type" name="ticket_type" value="{{ $ticket->ticket_type }}">
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $ticket->price }}">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description">{{ $ticket->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Ticket</button>
    </form>
@endsection
