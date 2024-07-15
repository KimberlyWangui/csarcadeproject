<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Game;
use App\Models\PromotionCode;

class AdminController extends Controller
{
    public function index()
    {
        $PromotionCodes = PromotionCode::all();
        $Games = Game::all();
        $Tickets = Ticket::all();
        return view('admin.dashboard')
        ->with('Tickets', $Tickets)
        ->with('Games', $Games)
        ->with('PromotionCodes', $PromotionCodes);
    }
}
