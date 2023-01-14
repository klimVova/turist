<?php

namespace App\Http\Controllers\API\Cafe;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cafe\CafeItemResource;
use App\Models\CafeTodoItem;


class ItemController extends Controller
{
    public function __invoke()
    {
        $cafeItem = CafeTodoItem::all();
        return  CafeItemResource::collection($cafeItem);
    }
}
