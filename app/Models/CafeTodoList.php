<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeTodoList extends Model
{
    use HasFactory;

    protected $table = 'cafe_todo_lists';
    protected $guarded = false;

    public function items(){
        return $this->hasMany(CafeTodoItem::class);
    }
}
