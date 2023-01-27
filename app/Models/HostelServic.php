<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostelServic extends Model
{
    use HasFactory;
    protected $table = 'hostel_servics';
    protected $guarded = false;
}
