<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportTodoProduct extends Model
{
    use HasFactory;
    protected $table = 'sport_todo_products';
    protected $guarded = false;

    public function items(){
        return $this->belongsTo(SportTodoItem::class);
    }
}
