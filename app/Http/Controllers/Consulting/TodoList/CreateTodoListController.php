<?php

namespace App\Http\Controllers\Consulting\TodoList;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateTodoListController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();

        return view('consulting.todolist.create', compact('user'));
    }
}
