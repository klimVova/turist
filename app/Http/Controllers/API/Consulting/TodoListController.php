<?php

namespace App\Http\Controllers\API\Consulting;

use App\Http\Controllers\Controller;
use App\Http\Resources\Consulting\TodoListResource;
use App\Models\ConsultingPost;
use App\Models\ConsultingTodoList;


class TodoListController extends Controller
{
    public function __invoke()
    {
        $lists = ConsultingTodoList::all();
        return  TodoListResource::collection($lists);
    }
}
