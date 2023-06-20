<?php

namespace App\Http\Controllers\API\Baner;

use App\Http\Controllers\Controller;
use App\Http\Resources\Baner\BanerResource;
use App\Models\Baner;


class ShowController extends Controller
{
    public function __invoke(Baner $baner)
    {
        return new BanerResource($baner);
    }
}
