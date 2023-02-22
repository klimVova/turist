<?php

namespace App\Http\Controllers\API\Hostel;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hostel\HostelActionResource;
use App\Models\HostelAction;


class ActionController extends Controller
{
    public function __invoke()
    {
        $hostelAction = HostelAction::all();
        return  HostelActionResource::collection($hostelAction);
    }
}
