<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuroperatorTodoList extends Model
{
    use HasFactory;

    protected $table = 'turoperator_todo_lists';
    protected $guarded = false;
}
