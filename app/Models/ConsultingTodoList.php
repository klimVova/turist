<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultingTodoList extends Model
{
    use HasFactory;

    protected $table = 'consulting_todo_lists';
    protected $guarded = false;
}
