<?php

namespace App\Http\Controllers\API\PreOrder;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\PreOrder\StoreRequest;
use App\Http\Resources\PreOrder\PreOrderIndexResource;
use App\Models\preOrder;


class IndexController extends Controller
{
    public function __invoke()
    {


        $preOrder = preOrder::all();

        return  PreOrderIndexResource::collection($preOrder);
    }
}
