<?php

namespace App\Http\Controllers\API\Hostel;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hostel\HostelResource;
use App\Models\HostelCard;
use App\Models\MedicalCard;


class ShowController extends Controller
{
    public function __invoke(HostelCard $hostelCard)
    {
        return new HostelResource($hostelCard);
    }
}
