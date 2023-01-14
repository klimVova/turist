<?php

namespace App\Http\Controllers\API\Cafe;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cafe\CafeResource;
use App\Models\CafeCard;


class ShowController extends Controller
{
    public function __invoke(CafeCard $cafeCard)
    {
        return new CafeResource($cafeCard);
    }
}
