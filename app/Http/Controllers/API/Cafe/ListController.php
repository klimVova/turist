<?php

namespace App\Http\Controllers\API\Cafe;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cafe\CafeListResource;
use App\Models\CafeTodoList;


class ListController extends Controller
{
    public function __invoke()
    {
        $cafeList = CafeTodoList::all();
        return  CafeListResource::collection($cafeList);
    }
}
