<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['ticket_type', 'price', 'description'];

    /**
     * The games that belong to the ticket.
     */
    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_ticket', 'ticket_id', 'game_id');
    }
}
