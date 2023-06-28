<?php

namespace App\Http\Controllers\API\Sport;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sport\SportServicResource;
use App\Models\SportServic;


class ServicController extends Controller
{
    public function __invoke()
    {
        $sportServic = SportServic::all();
        return  SportServicResource::collection($sportServic);
    }
}
