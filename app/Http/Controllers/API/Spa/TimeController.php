<?php

namespace App\Http\Controllers\API\Spa;

use App\Http\Controllers\Controller;
use App\Http\Resources\Spa\CafeTimeResource;
use App\Http\Resources\Spa\SpaTimeResource;
use App\Models\SpaTime;


class TimeController extends Controller
{
    public function __invoke()
    {
        $spaTime = SpaTime::all();
        return  SpaTimeResource::collection($spaTime);
    }
}
