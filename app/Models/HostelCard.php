<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HostelCard extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'hostel_cards';
    protected $guarded = false;
}
