<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaTime extends Model
{
    use HasFactory;
    protected $table = 'spa_times';
    protected $guarded = false;
}
