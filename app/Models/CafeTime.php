<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CafeTime extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cafe_times';
    protected $guarded = false;
}
