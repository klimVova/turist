<?php

namespace App\Http\Controllers\API\Spa;

use App\Http\Controllers\Controller;
use App\Http\Resources\Spa\SpaItemResource;
use App\Models\MedicalTodoItem;
use App\Models\SpaTodoItem;


class ItemController extends Controller
{
    public function __invoke()
    {
        $spaItem = SpaTodoItem::all();
        return  SpaItemResource::collection($spaItem);
    }
}
