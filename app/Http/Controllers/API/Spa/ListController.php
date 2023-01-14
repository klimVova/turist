<?php

namespace App\Http\Controllers\API\Spa;

use App\Http\Controllers\Controller;
use App\Http\Resources\Spa\CafeListResource;
use App\Http\Resources\Spa\SpaListResource;
use App\Models\SpaTodoList;


class ListController extends Controller
{
    public function __invoke()
    {
        $spaList = SpaTodoList::all();
        return  SpaListResource::collection($spaList);
    }
}
