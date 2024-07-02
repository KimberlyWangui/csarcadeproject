<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $primaryKey = 'game_id';
    public $incrementing = true; // Ensure this is set to true
    protected $fillable = ['name', 'video_path', 'description'];
}
