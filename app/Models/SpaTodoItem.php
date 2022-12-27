<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaTodoItem extends Model
{
    use HasFactory;

    protected $table = 'spa_todo_items';
    protected $guarded = false;

    public function lists(){
        return $this->belongsTo(SpaTodoList::class);
    }
    public function products(){
        return $this->hasMany(SpaTodoProduct::class);
    }
}
