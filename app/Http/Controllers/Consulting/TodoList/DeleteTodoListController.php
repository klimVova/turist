<?php

namespace App\Http\Controllers\Consulting\TodoList;

use App\Http\Controllers\Controller;
use App\Models\ConsultingTime;
use App\Models\ConsultingTodoList;
use Illuminate\Support\Facades\Auth;

class DeleteTodoListController extends Controller
{
    public function __invoke( ConsultingTodoList $consultingTodoList)
    {
        $consultingTodoList->delete();
        $user = Auth::id();
        return to_route('consulting.card.index',['id' => $consultingTodoList['cat_id']],$status = 302, compact('user'));
    }
}
