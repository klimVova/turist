<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersConsulting extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'orders_consultings';
    protected $guarded = false;
}
