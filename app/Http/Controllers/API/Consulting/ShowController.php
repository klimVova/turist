<?php

namespace App\Http\Controllers\API\Consulting;

use App\Http\Controllers\Controller;
use App\Http\Resources\Consulting\CardsResource;
use App\Models\ConsultingPost;


class ShowController extends Controller
{
    public function __invoke(ConsultingPost $consultingCard)
    {
        return new CardsResource($consultingCard);
    }
}
