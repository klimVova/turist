<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalTodoList extends Model
{
    use HasFactory;
    protected $table = 'medical_todo_lists';
    protected $guarded = false;

    public function items(){
        return $this->hasMany(MedicalTodoItem::class);
    }
}
