<?php

namespace App\Http\Controllers\Medical\TodoList;

use App\Http\Controllers\Controller;
use App\Models\MedicalTodoList;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function __invoke(MedicalTodoList $medicalTodoList){
        $items =  DB::table('medical_todo_items')->where('medical_todo_list_id', '=', $medicalTodoList->id)->get();
        $user = Auth::id();
        return view('medical.todolist.item', compact('user' , 'items','medicalTodoList'));
    }
}
