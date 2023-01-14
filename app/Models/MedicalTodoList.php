<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalTodoList extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'medical_todo_lists';
    protected $guarded = false;

    public function items(){
        return $this->hasMany(MedicalTodoItem::class);
    }
}
