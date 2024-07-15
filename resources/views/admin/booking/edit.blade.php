@extends('layouts.admin')

@section('title')
    Booking Edit
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Booking Edit Data</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <form action="/admin/booking-update/{{$Booking->id}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    
                    <div class="form-group">
                        <label class="font-weight-bold">USER ID:</label>
                        <input type="text" name="user_id" value="{{$Booking->user_id}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">TICKET ID:</label>
                        <input type="text" name="ticket_id" value="{{$Booking->ticket_id}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">TICKET TYPE:</label>
                        <input type="text" name="ticket_type" value="{{$Booking->ticket_type}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">QUANTITY</label>
                        <input type="text" name="quantity" value="{{$Booking->quantity}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">TOTAL PRICE:</label>
                        <input type="text" name="amount" value="{{$Booking->amount}}" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">UPDATE</button>
                    <a href="/admin/bookings" class="btn btn-secondary">BACK</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection
