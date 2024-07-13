<?php

// app/Models/PromotionCode.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromotionCode extends Model
{
    protected $fillable = ['code', 'discount_percentage', 'first_time_only', 'minimum_cart_value'];
}
