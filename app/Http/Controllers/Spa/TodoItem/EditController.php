<?php

namespace App\Http\Controllers\Spa\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\SpaCard;
use App\Models\SpaTodoItem;

class EditController extends Controller
{
    public function __invoke(SpaTodoItem $spaTodoItem)
    {
        return view('spa.todoitem.edit' , compact('spaTodoItem'));
    }
}
