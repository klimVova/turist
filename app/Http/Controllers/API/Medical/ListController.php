<?php

namespace App\Http\Controllers\API\Medical;

use App\Http\Controllers\Controller;
use App\Http\Resources\Medical\MedicalListResource;
use App\Models\MedicalTodoList;


class ListController extends Controller
{
    public function __invoke()
    {
        $medicalList = MedicalTodoList::all();
        return  MedicalListResource::collection($medicalList);
    }
}
