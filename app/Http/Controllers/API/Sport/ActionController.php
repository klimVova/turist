<?php

namespace App\Http\Controllers\API\Sport;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sport\SportActionResource;

use App\Models\SportAction;


class ActionController extends Controller
{
    public function __invoke()
    {
        $sportAction = SportAction::all();
        return  SportActionResource::collection($sportAction);
    }
}
