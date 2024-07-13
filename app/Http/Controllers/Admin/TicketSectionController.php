<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketSectionController extends Controller
{
    public function index()
    {
        $Tickets = Ticket::all();
        return view('admin.ticket')
        ->with('Tickets', $Tickets);
    }
    public function store(Request $request)
    {
        $Ticket = new Ticket();
        $Ticket->ticket_type = $request->input('ticket_type');
        $Ticket->price = $request->input('price');
        $Ticket->description = $request->input('description');

        $Ticket->save();
        return redirect('/admin/tickets')->with('status', 'The Ticket has been added successfully');

    }
    public function edit($id){
        $Ticket = Ticket::find($id);
        return view('admin.ticket.edit')
        ->with('Ticket', $Ticket);
    }
    public function update(Request $request, $id){
        $Ticket = Ticket::find($id);
        $Ticket->ticket_type = $request->input('ticket_type');
        $Ticket->price = $request->input('price');
        $Ticket->description = $request->input('description');

        $Ticket->update();
        return redirect('/admin/tickets')->with('status', 'The ticket has been updated successfully');
    }

    public function delete($id){
        $Ticket = Ticket::find($id);
        $Ticket->delete();
        return redirect('/admin/tickets')->with('status', 'The ticket has been deleted successfully');
    }
}
