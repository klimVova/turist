<?php

namespace App\Http\Controllers\API\Hostel;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hostel\HostelServicResource;
use App\Models\HostelServic;


class ServicController extends Controller
{
    public function __invoke()
    {
        $hostelServic = HostelServic::all();
        return  HostelServicResource::collection($hostelServic);
    }
}
