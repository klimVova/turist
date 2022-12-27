<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaTodoProduct extends Model
{
    use HasFactory;
    protected $table = 'spa_todo_products';
    protected $guarded = false;

    public function items(){
        return $this->belongsTo(SpaTodoItem::class);
    }
}
