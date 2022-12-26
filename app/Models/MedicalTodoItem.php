<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalTodoItem extends Model
{
    use HasFactory;

    protected $table = 'medical_todo_items';
    protected $guarded = false;

    public function lists(){
        return $this->belongsTo(MedicalTodoList::class);
    }
    public function products(){
        return $this->hasMany(MedicalTodoProduct::class);
    }
}
