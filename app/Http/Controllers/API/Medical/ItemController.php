<?php

namespace App\Http\Controllers\API\Medical;

use App\Http\Controllers\Controller;
use App\Http\Resources\Medical\MedicalItemResource;
use App\Models\MedicalTodoItem;


class ItemController extends Controller
{
    public function __invoke()
    {
        $medicalItem = MedicalTodoItem::all();
        return  MedicalItemResource::collection($medicalItem);
    }
}
