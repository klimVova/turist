<?php

namespace App\Http\Controllers\API\Sport;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sport\SportItemResource;
use App\Models\SportTodoItem;


class ItemController extends Controller
{
    public function __invoke()
    {
        $sportItem = SportTodoItem::all();
        return  SportItemResource::collection($sportItem);
    }
}
