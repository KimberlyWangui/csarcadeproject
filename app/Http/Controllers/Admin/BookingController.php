<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $Bookings = Booking::all();
        return view('admin.booking')
        ->with('Bookings', $Bookings);
    }

    public function edit($id)
    {
        $Booking = Booking::find($id);
        return view('admin.booking.edit')
        ->with('Booking', $Booking);
    }

    public function update(Request $request, $id)
    {
        $Booking = Booking::find($id);
        $Booking->user_id = $request->input('user_id');
        $Booking->ticket_id = $request->input('ticket_id');
        $Booking->ticket_type = $request->input('ticket_type');
        $Booking->quantity = $request->input('quantity');
        $Booking->amount = $request->input('amount');
        $Booking->update();
        return redirect('/admin/bookings')->with('status', 'The booking has been updated successfully');
    }

    public function delete($id)
    {
        $Booking = Booking::find($id);
        $Booking->delete();
        return redirect('/admin/bookings')->with('status', 'The booking has been deleted successfully');
    }

}
