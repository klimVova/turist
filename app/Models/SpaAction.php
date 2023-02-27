<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaAction extends Model
{
    use HasFactory;

    protected $table = 'spa_actions';
    protected $guarded = false;
}
