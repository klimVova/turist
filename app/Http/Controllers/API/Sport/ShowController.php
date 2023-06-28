<?php

namespace App\Http\Controllers\API\Sport;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sport\SportResource;
use App\Models\SportCard;
use App\Models\MedicalCard;


class ShowController extends Controller
{
    public function __invoke(SportCard $sportCard)
    {
        return new SportResource($sportCard);
    }
}
