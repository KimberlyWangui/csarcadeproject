<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $primaryKey = 'game_id';
    public $incrementing = true; 
    protected $fillable = ['name', 'video_path', 'description'];


    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'game_ticket', 'game_id', 'ticket_id');
    }
}
