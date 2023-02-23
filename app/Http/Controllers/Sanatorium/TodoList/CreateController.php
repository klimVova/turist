<?php

namespace App\Http\Controllers\Sanatorium\TodoList;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('sanatorium.todolist.create', compact('user'));
    }
}
