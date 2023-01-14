<?php

namespace App\Http\Controllers\API\Spa;

use App\Http\Controllers\Controller;
use App\Http\Resources\Spa\CafeProductResource;
use App\Http\Resources\Spa\SpaProductResource;
use App\Models\SpaTodoItem;
use App\Models\SpaTodoProduct;


class ProductController extends Controller
{
    public function __invoke()
    {
        $spaProduct = SpaTodoProduct::all();
        return  SpaProductResource::collection($spaProduct);
    }
}
