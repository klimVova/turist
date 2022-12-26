<?php

namespace App\Http\Controllers\Medical\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\MedicalTodoItem;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __invoke(MedicalTodoItem $medicalTodoItem){
        $products =  DB::table('medical_todo_items')->where('medical_todo_list_id', '=', $medicalTodoItem->id)->get();
        $user = Auth::id();
        return view('medical.todoitem.product', compact('user' , 'products','medicalTodoItem'));
    }
}
