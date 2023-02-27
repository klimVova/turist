<?php

namespace App\Http\Controllers\Cafe\Action;

use App\Http\Controllers\Controller;
use App\Models\CafeAction;

class ShowController extends Controller
{
    public function __invoke(CafeAction $cafeAction)
    {
        return view('cafe.todolist.show', compact('cafeAction'));
    }
}
