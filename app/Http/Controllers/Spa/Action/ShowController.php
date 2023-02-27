<?php

namespace App\Http\Controllers\Spa\Action;

use App\Http\Controllers\Controller;
use App\Models\SpaAction;

class ShowController extends Controller
{
    public function __invoke(SpaAction $spaAction)
    {
        return view('spa.todolist.show', compact('spaAction'));
    }
}
