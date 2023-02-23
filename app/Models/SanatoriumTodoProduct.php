<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanatoriumTodoProduct extends Model
{
    use HasFactory;
    protected $table = 'sanatorium_todo_products';
    protected $guarded = false;

    public function items(){
        return $this->belongsTo(SanatoriumTodoItem::class);
    }
}
