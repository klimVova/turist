<?php

namespace App\Http\Controllers\API\Sanatorium;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sanatorium\SanatoriumProductResource;
use App\Models\SanatoriumTodoItem;
use App\Models\SanatoriumTodoProduct;


class ProductController extends Controller
{
    public function __invoke()
    {
        $sanatoriumProduct = SanatoriumTodoProduct::all();
        return  SanatoriumProductResource::collection($sanatoriumProduct);
    }
}
