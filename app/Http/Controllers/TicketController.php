<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the tickets available for purchase.
     *
     * @return \Illuminate\View\View
     */
    public function buyTickets()
    {
        // Assuming you have logic to fetch available tickets for purchase
        $tickets = Ticket::where('available', true)->get();
        
        return view('tickets.buytickets', compact('tickets'));
    }

    /**
     * Display a listing of the tickets in the admin panel.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new ticket.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created ticket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'ticket_type' => 'required|string|unique:tickets',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Ticket::create([
            'ticket_type' => $request->ticket_type,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified ticket.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified ticket.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified ticket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ticket_type' => 'required|string|unique:tickets,ticket_type,' . $id,
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update([
            'ticket_type' => $request->ticket_type,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully.');
    }

    /**
     * Remove the specified ticket from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully.');
    }
}
