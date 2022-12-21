<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostelPostTag extends Model
{
    use HasFactory;

    protected $table = 'hostel_post_tags';
    protected $guarded = false;
}
