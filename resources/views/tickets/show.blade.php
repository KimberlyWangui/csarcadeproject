@extends('layouts.navtwo')

@section('content')
    <h1>Ticket Details</h1>

    <div>
        <p><strong>Ticket Type:</strong> {{ $ticket->ticket_type }}</p>
        <p><strong>Price:</strong> ${{ number_format($ticket->price, 2) }}</p>
        <p><strong>Description:</strong> {{ $ticket->description }}</p>
        <p><strong>Created At:</strong> {{ $ticket->created_at->format('M d, Y H:i:s') }}</p>
    </div>

    <a href="{{ route('tickets.index') }}" class="btn btn-primary">Back to Tickets List</a>
@endsection
