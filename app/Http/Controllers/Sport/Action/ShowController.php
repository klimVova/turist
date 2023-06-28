<?php

namespace App\Http\Controllers\Sport\Action;

use App\Http\Controllers\Controller;
use App\Models\SportAction;

class ShowController extends Controller
{
    public function __invoke(SportAction $sportAction)
    {
        return view('sport.todolist.show', compact('sportAction'));
    }
}
