<?php

namespace App\Http\Controllers\Turoperator\TodoList;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('turoperator.todolist.create', compact('user'));
    }
}
