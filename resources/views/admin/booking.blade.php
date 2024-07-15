@extends('layouts.admin')

@section('title')
    Bookings
@endsection

@section('content')

<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Booking Table</h6>
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
                      <th>ID</th>
                      <th>User ID</th>
                      <th>Ticket ID</th>
                      <th>Ticket Type</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                      <th>Date</th>
                      <th>EDIT</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($Bookings as $booking)
                    <tr>
                      <td>{{$booking->id}}</td>
                      <td>{{$booking->user_id}}</td>
                      <td>{{$booking->ticket_id}}</td>
                      <td>{{$booking->ticket_type}}</td>
                      <td>{{$booking->quantity}}</td>
                      <td>{{$booking->amount}}</td>
                      <td>{{$booking->created_at}}</td>
                      <td>
                      <a href="{{url('admin/edit-booking/'.$booking->id)}}" class="btn btn-primary">Edit</a>
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