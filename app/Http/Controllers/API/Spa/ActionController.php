<?php

namespace App\Http\Controllers\API\Spa;

use App\Http\Controllers\Controller;
use App\Http\Resources\Spa\SpaActionResource;
use App\Models\SpaAction;


class ActionController extends Controller
{
    public function __invoke()
    {
        $spaAction = SpaAction::all();
        return  SpaActionResource::collection($spaAction);
    }
}
