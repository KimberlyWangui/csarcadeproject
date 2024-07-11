<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['ticket_type', 'price', 'description'];

    public function getDisplayTitle()
    {
        $titles = [
            'child' => 'Child Ticket',
            'adult' => 'Adult Ticket',
            'family' => 'Family Package',
            'group' => 'Group Package'
        ];

        return $titles[$this->ticket_type] ?? ucfirst($this->ticket_type);
    }

    /**
     * The games that belong to the ticket.
     */
    
}
