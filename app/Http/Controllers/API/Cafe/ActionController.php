<?php

namespace App\Http\Controllers\API\Cafe;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cafe\CafeActionResource;
use App\Models\CafeAction;


class ActionController extends Controller
{
    public function __invoke()
    {
        $cafeAction = CafeAction::all();
        return  CafeActionResource::collection($cafeAction);
    }
}
