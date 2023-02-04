<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostelAction extends Model
{
    use HasFactory;

    protected $table = 'hostel_actions';
    protected $guarded = false;
}
