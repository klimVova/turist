<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportAction extends Model
{
    use HasFactory;

    protected $table = 'sport_actions';
    protected $guarded = false;
}
