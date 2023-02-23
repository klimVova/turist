<?php

namespace App\Http\Controllers\API\Sanatorium;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sanatorium\SanatoriumServicResource;
use App\Models\SanatoriumServic;


class ServicController extends Controller
{
    public function __invoke()
    {
        $sanatoriumServic = SanatoriumServic::all();
        return  SanatoriumServicResource::collection($sanatoriumServic);
    }
}
