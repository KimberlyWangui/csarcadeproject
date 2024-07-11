@extends('layouts.navtwo')

@section('content')
    <h1>Tickets List</h1>

    <a href="{{ route('tickets.create') }}" class="btn btn-primary mb-3">Create New Ticket</a>

    <table class="table">
        <thead>
            <tr>
                <th>Ticket Type</th>
                <th>Price</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <td>{{ $ticket->ticket_type }}</td>
                <td>${{ number_format($ticket->price, 2) }}</td>
                <td>{{ $ticket->description }}</td>
                <td>{{ $ticket->created_at->format('M d, Y H:i:s') }}</td>
                <td>
                    <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-info">View</a>
                    <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ticket?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
