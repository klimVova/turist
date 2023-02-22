<?php

namespace App\Http\Controllers\API\Hostel;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hostel\HostelPostResource;
use App\Http\Resources\Hostel\HostelServicResource;
use App\Models\HostelPost;
use App\Models\HostelServic;


class PostController extends Controller
{
    public function __invoke()
    {
        $hostelPost = HostelPost::all();
        return  HostelPostResource::collection($hostelPost);
    }
}
