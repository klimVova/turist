<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeTodoProduct extends Model
{
    use HasFactory;
    protected $table = 'cafe_todo_products';
    protected $guarded = false;

    public function items(){
        return $this->belongsTo(CafeTodoItem::class);
    }
}
