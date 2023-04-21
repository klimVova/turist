<?php

namespace App\Http\Controllers\API\Sanatorium;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sanatorium\SanatoriumActionResource;

use App\Models\SanatoriumAction;


class ActionController extends Controller
{
    public function __invoke()
    {
        $sanatoriumAction = SanatoriumAction::all();
        return  SanatoriumActionResource::collection($sanatoriumAction);
    }
}
