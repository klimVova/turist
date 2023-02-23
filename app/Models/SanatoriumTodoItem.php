<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanatoriumTodoItem extends Model
{
    use HasFactory;
    protected $table = 'sanatorium_todo_items';
    protected $guarded = false;

    public function lists(){
        return $this->belongsTo(SanatoriumTodoList::class);
    }
    public function products(){
        return $this->hasMany(SanatoriumTodoProduct::class);
    }
}
