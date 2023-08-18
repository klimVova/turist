<?php

namespace App\Http\Controllers\API\Consulting;

use App\Http\Controllers\Controller;
use App\Http\Resources\Consulting\CardsResource;
use App\Models\ConsultingPost;


class CardController extends Controller
{
    public function __invoke()
    {
        $cards = ConsultingPost::all();
        return  CardsResource::collection($cards);
    }
}
