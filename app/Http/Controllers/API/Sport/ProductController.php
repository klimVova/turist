<?php

namespace App\Http\Controllers\API\Sport;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sport\SportProductResource;
use App\Models\SportTodoProduct;


class ProductController extends Controller
{
    public function __invoke()
    {
        $sportProduct = SportTodoProduct::all();
        return  SportProductResource::collection($sportProduct);
    }
}
