<?php

namespace App\Http\Controllers\API\Medical;

use App\Http\Controllers\Controller;
use App\Http\Resources\Medical\MedicalResource;
use App\Models\MedicalCard;


class ShowController extends Controller
{
    public function __invoke(MedicalCard $medicalCard)
    {
        return new MedicalResource($medicalCard);
    }
}
