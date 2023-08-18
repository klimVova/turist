<?php

namespace App\Http\Controllers\API\Consulting;

use App\Http\Controllers\Controller;
use App\Http\Resources\Consulting\ServicResource;
use App\Models\ConsultingService;


class ServicController extends Controller
{
    public function __invoke()
    {
        $lists = ConsultingService::all();
        return  ServicResource::collection($lists);
    }
}
