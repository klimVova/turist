<?php

namespace App\Http\Controllers\API\Cafe;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cafe\CafeTimeResource;
use App\Models\CafeTime;


class TimeController extends Controller
{
    public function __invoke()
    {
        $cafeTime = CafeTime::all();
        return  CafeTimeResource::collection($cafeTime);
    }
}
