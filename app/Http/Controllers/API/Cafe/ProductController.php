<?php

namespace App\Http\Controllers\API\Cafe;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cafe\SanatoriumProductResource;
use App\Models\CafeTodoItem;
use App\Models\CafeTodoProduct;


class ProductController extends Controller
{
    public function __invoke()
    {
        $cafeProduct = CafeTodoProduct::all();
        return  SanatoriumProductResource::collection($cafeProduct);
    }
}
