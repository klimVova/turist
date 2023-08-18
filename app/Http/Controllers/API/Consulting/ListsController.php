<?php

namespace App\Http\Controllers\API\Consulting;

use App\Http\Controllers\Controller;
use App\Http\Resources\Consulting\ListsResource;
use App\Models\ConsultingPost;
use App\Models\ConsultingService;


class ListsController extends Controller
{
    public function __invoke()
    {
        $lists = ConsultingService::all();
        return  ListsResource::collection($lists);
    }
}
