<?php

namespace App\Http\Controllers\API\Medical;

use App\Http\Controllers\Controller;
use App\Http\Resources\Medical\MedicalActionResource;
use App\Models\MedicalAction;


class ActionController extends Controller
{
    public function __invoke()
    {
        $medicalAction = MedicalAction::all();
        return  MedicalActionResource::collection($medicalAction);
    }
}
