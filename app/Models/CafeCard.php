<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeCard extends Model
{
    use HasFactory;
    protected $table = 'cafe_cards';
    protected $guarded = false;
}
