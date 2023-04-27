<?php

namespace App\Http\Controllers\API\Tur;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tur\TurTimeResource;
use App\Models\TuroperatorTime;


class TimeController extends Controller
{
    public function __invoke()
    {
        $turTime = TuroperatorTime::all();
        return TurTimeResource::collection($turTime);
    }
}
