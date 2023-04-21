<?php

namespace App\Http\Controllers\API\Tur;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tur\TurResource;
use App\Models\TuroperatorCard;


class ShowController extends Controller
{
    public function __invoke(TuroperatorCard $turCard)
    {
        return new TurResource($turCard);
    }
}
