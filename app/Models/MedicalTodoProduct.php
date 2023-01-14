<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalTodoProduct extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'medical_todo_products';
    protected $guarded = false;

    public function items(){
        return $this->belongsTo(MedicalTodoItem::class);
    }
}
