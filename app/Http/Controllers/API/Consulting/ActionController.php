<?php

namespace App\Http\Controllers\API\Consulting;

use App\Http\Controllers\Controller;
use App\Http\Resources\Consulting\ActionResource;
use App\Models\ConsultingAction;


class ActionController extends Controller
{
    public function __invoke()
    {
        $lists = ConsultingAction::all();
        return  ActionResource::collection($lists);
    }
}
