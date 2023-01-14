<?php

namespace App\Http\Controllers\API\Spa;

use App\Http\Controllers\Controller;
use App\Http\Resources\Spa\SpaResource;
use App\Models\SpaCard;


class ShowController extends Controller
{
    public function __invoke(SpaCard $spaCard)
    {
        return new SpaResource($spaCard);
    }
}
