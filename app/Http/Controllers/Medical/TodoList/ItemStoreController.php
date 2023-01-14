<?php

namespace App\Http\Controllers\Medical\TodoList;

use App\Http\Controllers\Controller;
use App\Models\MedicalTodoItem;
use App\Models\MedicalTodoList;
use Illuminate\Http\Request;

class ItemStoreController extends Controller
{
    public function __invoke(Request $request, MedicalTodoList $medicalTodoList)
    {
        //dd($request->title);
        MedicalTodoItem::create([
            'medical_todo_list_id' => $medicalTodoList->id,
            'title' => $request->title,
            'price' => $request->price,
        ]);
        return redirect()->route('medical.todolist.index');
    }
}
