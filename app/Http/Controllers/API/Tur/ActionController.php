<?php

namespace App\Http\Controllers\API\Tur;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tur\TurActionResource;
use App\Models\TuroperatorAction;


class ActionController extends Controller
{
    public function __invoke()
    {
        $turAction = TuroperatorAction::all();
        return  TurActionResource::collection($turAction);
    }
}
