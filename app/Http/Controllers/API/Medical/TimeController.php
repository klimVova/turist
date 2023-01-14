<?php

namespace App\Http\Controllers\API\Medical;

use App\Http\Controllers\Controller;
use App\Http\Resources\Medical\MedicalTimeResource;
use App\Models\MedicalTime;


class TimeController extends Controller
{
    public function __invoke()
    {
        $medicalTime = MedicalTime::all();
        return  MedicalTimeResource::collection($medicalTime);
    }
}
