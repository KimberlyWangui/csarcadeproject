@extends('layouts.admin')

@section('title')
    TicketSection Edit
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Ticket Edit Data</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <form action="/admin/ticket-update/{{$Ticket->id}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="ticket_type" class="font-weight-bold">TICKET TYPE:</label>
                        <input type="text" name="ticket_type" class="form-control" id="ticket_type" value="{{$Ticket->ticket_type}}">
                    </div>
                    <div class="form-group">
                        <label for="price" class="font-weight-bold">PRICE:</label>
                        <input type="text" name="price" class="form-control" id="price" value="{{$Ticket->price}}">
                    </div>
                    <div class="form-group">
                        <label for="description" class="font-weight-bold">DESCRIPTION:</label>
                        <textarea name="description" class="form-control" id="description">{{$Ticket->description}}</textarea>
                    </div>

                    <div class="modal-footer">
                        <a href="/admin/tickets" class="btn btn-secondary">BACK</a>
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection
