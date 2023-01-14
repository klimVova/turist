<?php

namespace App\Http\Controllers\Medical\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\MedicalTodoItem;
use App\Models\MedicalTodoList;
use App\Models\MedicalTodoProduct;
use App\Models\HostelImage;
use App\Models\HostelPost;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductStoreController extends Controller
{
    public function __invoke(Request $request, MedicalTodoItem $medicalTodoItem)
    {
        MedicalTodoProduct::create([
            'medical_todo_item_id' => $medicalTodoItem->id,
            'title' => $request->title,
            'price' => $request->price,
        ]);
        return redirect()->route('medical.todolist.index');
    }
}
