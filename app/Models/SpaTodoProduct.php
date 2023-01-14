<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpaTodoProduct extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'spa_todo_products';
    protected $guarded = false;

    public function items(){
        return $this->belongsTo(SpaTodoItem::class);
    }
}
