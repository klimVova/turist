<?php

namespace App\Http\Controllers\Consulting\TodoList;
use App\Http\Requests\Consulting\TodoList\StoreTodoListRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ConsultingTodoList;

class StoreTodoListController extends Controller
{
    public function __invoke(StoreTodoListRequest $request)
    {

        $data = $request->validated();
        $user = Auth::id();
        ConsultingTodoList::firstOrCreate($data);
        return to_route('consulting.card.index',['id' => $data['cat_id']],$status = 302, compact('user'));
    }
}
