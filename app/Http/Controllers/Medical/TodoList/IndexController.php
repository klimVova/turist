<?php

namespace App\Http\Controllers\Medical\TodoList;

use App\Http\Controllers\Controller;
use App\Models\MedicalTodoItem;
use App\Models\MedicalTodoList;
use App\Models\MedicalTodoProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $medicalTodoLists = auth()->user()->medicalTodoLists;
        $items =  MedicalTodoItem::all();
        $products =  MedicalTodoProduct::all();
        return view('medical.todolist.index', compact('user','medicalTodoLists', 'items', 'products'));
    }
}
