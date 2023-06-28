<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportTodoItem extends Model
{
    use HasFactory;
    protected $table = 'sport_todo_items';
    protected $guarded = false;

    public function lists(){
        return $this->belongsTo(SportTodoList::class);
    }
    public function products(){
        return $this->hasMany(SportTodoProduct::class);
    }
}
