<?php

namespace App\Http\Controllers\API\Sport;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sport\SportListResource;
use App\Models\SportTodoList;


class ListController extends Controller
{
    public function __invoke()
    {
        $sportList = SportTodoList::all();
        return  SportListResource::collection($sportList);
    }
}
