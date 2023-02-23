<?php

namespace App\Http\Controllers\API\Sanatorium;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sanatorium\SanatoriumResource;
use App\Models\SanatoriumCard;
use App\Models\MedicalCard;


class ShowController extends Controller
{
    public function __invoke(SanatoriumCard $sanatoriumCard)
    {
        return new SanatoriumResource($sanatoriumCard);
    }
}
