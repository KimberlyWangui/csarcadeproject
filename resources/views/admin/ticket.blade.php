@extends('layouts.admin')

@section('title')
    Tickets Section
@endsection

@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Tickets</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/admin/save-tickets" method="POST">
        {{ csrf_field() }}

      <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Ticket Type:</label>
            <input type="text" name="ticket_type" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Price:</label>
            <input type="text" name="price" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea name="description" class="form-control" id="message-text"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">SAVE</button>
      </div>
      </form>

    </div>
  </div>
</div>

<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Tickets Section
                <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD</button>
                </h6>
                @if(Session('status'))
                <div class="alert alert-success" role="alert">
                    {{Session('status')}}
                </div>
                @endif
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                    <th class="w-10p">ID</th>
                      <th class="w-10p">Ticket Type</th>
                      <th class="w-10p">Price</th>
                      <th class="w-10p">Description</th>
                      <th class="w-10p">EDIT</th>
                      <th class="w-10p">DELETE</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($Tickets as $ticket)
                    <tr>
                      <td>{{$ticket->id}}</td>
                      <td>{{$ticket->ticket_type}}</td>
                      <td>{{$ticket->price}}</td>
                      <td>{{$ticket->description}}</td>
                      <td>
                        <a href="{{url('admin/edit-tickets/'.$ticket->id)}}" class="btn btn-success">Edit</a>
                      </td>
                      <td>
                      <form action="/admin/ticket-delete/{{$ticket->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     
@endsection

@section('scripts')
@endsection

