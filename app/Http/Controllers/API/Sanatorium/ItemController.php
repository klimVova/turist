<?php

namespace App\Http\Controllers\API\Sanatorium;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sanatorium\SanatoriumItemResource;
use App\Models\SanatoriumTodoItem;


class ItemController extends Controller
{
    public function __invoke()
    {
        $sanatoriumItem = SanatoriumTodoItem::all();
        return  SanatoriumItemResource::collection($sanatoriumItem);
    }
}
