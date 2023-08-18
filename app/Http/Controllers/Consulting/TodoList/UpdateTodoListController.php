<?php

namespace App\Http\Controllers\Consulting\TodoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\Consulting\TodoList\UpdateTodoListRequest;
use App\Models\ConsultingTodoList;
use Illuminate\Support\Facades\Auth;

class UpdateTodoListController extends Controller
{
    public function __invoke(UpdateTodoListRequest $request, ConsultingTodoList $consultingTodoList)
    {
        $data = $request->validated();
        $consultingTodoList->update($data);
        $user = Auth::id();
        return to_route('consulting.card.index',['id' => $consultingTodoList['cat_id']],$status = 302, compact('user'));
    }
}
