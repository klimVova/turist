<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'surname',
        'phone',
        'user_id',
        'name_product',
        'date_product',
        'total_price_product',
        'amount',
        'orderId',
    ];
}
