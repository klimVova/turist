<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaTodoList extends Model
{
    use HasFactory;
    protected $table = 'spa_todo_lists';
    protected $guarded = false;

    public function items(){
        return $this->hasMany(SpaTodoItem::class);
    }
}
