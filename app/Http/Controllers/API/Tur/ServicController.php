<?php

namespace App\Http\Controllers\API\Tur;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tur\TurServicResource;
use App\Models\TuroperatorServic;



class ServicController extends Controller
{
    public function __invoke()
    {
        $turServic = TuroperatorServic::all();
        return  TurServicResource::collection($turServic);
    }
}
