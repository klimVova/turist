<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preOrder extends Model
{
    use HasFactory;

    protected $table = 'pre_orders';
    protected $guarded = false;
}
