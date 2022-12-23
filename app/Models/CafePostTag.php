<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafePostTag extends Model
{
    use HasFactory;
    protected $table = 'cafe_post_tags';
    protected $guarded = false;
}
