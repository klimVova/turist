<?php

namespace App\Http\Controllers\API\Consulting;

use App\Http\Controllers\Controller;
use App\Http\Resources\Consulting\ListsResource;
use App\Models\ConsultingList;


class ListController extends Controller
{
    public function __invoke()
    {
        $lists = ConsultingList::all();
        return  ListsResource::collection($lists);
    }
}
