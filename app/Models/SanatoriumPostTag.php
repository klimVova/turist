<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanatoriumPostTag extends Model
{
    use HasFactory;
    protected $table = 'sanatorium_post_tags';
    protected $guarded = false;
}
