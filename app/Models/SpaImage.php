<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaImage extends Model
{
    use HasFactory;
    protected $table = 'spa_images';
    protected $guarded = false;
}

