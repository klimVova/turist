<?php

namespace App\Http\Controllers\API\Sanatorium;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sanatorium\SanatoriumListResource;
use App\Models\SanatoriumTodoList;


class ListController extends Controller
{
    public function __invoke()
    {
        $sanatoriumList = SanatoriumTodoList::all();
        return  SanatoriumListResource::collection($sanatoriumList);
    }
}
