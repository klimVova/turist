<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HostelPost extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'hostel_posts';
    protected $guarded = false;
}
