<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalTodoItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'medical_todo_items';
    protected $guarded = false;

    public function lists(){
        return $this->belongsTo(MedicalTodoList::class);
    }
    public function products(){
        return $this->hasMany(MedicalTodoProduct::class);
    }
}
