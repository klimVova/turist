<?php

namespace App\Http\Controllers\Sanatorium\Action;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumAction;

class ShowController extends Controller
{
    public function __invoke(SanatoriumAction $sanatoriumAction)
    {
        return view('sanatorium.todolist.show', compact('sanatoriumAction'));
    }
}
