<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CartItem extends Model
{
    protected $fillable = ['user_id', 'username', 'ticket_id', 'ticket_type', 'quantity', 'ticket_price', 'total_amount'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($cartItem) {
            if (Auth::check() && empty($cartItem->username)) {
                $cartItem->username = Auth::user()->name;
            }
        });

        static::updating(function ($cartItem) {
            if (Auth::check() && empty($cartItem->username)) {
                $cartItem->username = Auth::user()->name;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}