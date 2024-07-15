<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;


class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.booking.index', compact('bookings'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.booking.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->user_id = $request->input('user_id');
        $booking->ticket_id = $request->input('ticket_id');
        $booking->ticket_type = $request->input('ticket_type');
        $booking->quantity = $request->input('quantity');
        $booking->amount = $request->input('amount');
        $booking->update();

        return redirect('admin/bookings')->with('status', 'The booking has been updated successfully');
    }

    public function delete($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect('admin/bookings')->with('status', 'The booking has been deleted successfully');
    }

  
}