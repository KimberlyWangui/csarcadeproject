<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'ticket_id',
        'ticket_type',
        'quantity',
        'amount',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
