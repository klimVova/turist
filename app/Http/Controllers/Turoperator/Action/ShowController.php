<?php

namespace App\Http\Controllers\Turoperator\Action;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorAction;

class ShowController extends Controller
{
    public function __invoke(TuroperatorAction $turoperatorAction)
    {
        return view('turoperator.todolist.show', compact('turoperatorAction'));
    }
}
