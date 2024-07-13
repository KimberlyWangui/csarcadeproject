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
                <h6 class="text-white text-capitalize ps-3">Games Edit Data</h6>
                
       <form action="/admin/ticket-update/{{$Ticket->id}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
      <div class="modal-body">
        
      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Ticket Type:</label>
            <input type="text" name="ticket_type" class="form-control" id="recipient-name" value="{{$Ticket->ticket_type}}">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Price:</label>
            <input type="text" name="price" class="form-control" id="recipient-name" value="{{$Ticket->price}}">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea name="description" class="form-control" id="message-text">{{$Ticket->description}}</textarea>
          </div>

      </div>
      <div class="modal-footer">
        <a href="/admin/tickets" class="btn btn-secondary">BACK</button>
        <button type="submit" class="btn btn-primary">UPDATE</button>
      </div>
      </form>

              </div>
            </div>
            </div>
        </div>
</div>
     
@endsection

@section('scripts')
@endsection

