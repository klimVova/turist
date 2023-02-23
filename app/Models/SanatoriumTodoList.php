<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanatoriumTodoList extends Model
{
    use HasFactory;
    protected $table = 'sanatorium_todo_lists';
    protected $guarded = false;

    public function items(){
        return $this->hasMany(SanatoriumTodoItem::class);
    }
}
