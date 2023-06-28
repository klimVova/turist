<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportTodoList extends Model
{
    use HasFactory;
    protected $table = 'sport_todo_lists';
    protected $guarded = false;

    public function items(){
        return $this->hasMany(SportTodoItem::class);
    }
}
