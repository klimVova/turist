<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalTodoProduct extends Model
{
    use HasFactory;
    protected $table = 'medical_todo_products';
    protected $guarded = false;

    public function items(){
        return $this->belongsTo(MedicalTodoItem::class);
    }
}
