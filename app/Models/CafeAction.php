<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeAction extends Model
{
    use HasFactory;

    protected $table = 'cafe_actions';
    protected $guarded = false;
}
