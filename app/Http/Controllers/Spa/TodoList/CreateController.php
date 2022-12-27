<?php

namespace App\Http\Controllers\Spa\TodoList;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('spa.todolist.create', compact('user'));
    }
}
