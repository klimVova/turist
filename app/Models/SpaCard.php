<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaCard extends Model
{
    use HasFactory;
    protected $table = 'spa_cards';
    protected $guarded = false;
}
