<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeTodoItem extends Model
{
    use HasFactory;

    protected $table = 'cafe_todo_items';
    protected $guarded = false;

    public function lists(){
        return $this->belongsTo(CafeTodoList::class);
    }
    public function products(){
        return $this->hasMany(CafeTodoProduct::class);
    }
}
