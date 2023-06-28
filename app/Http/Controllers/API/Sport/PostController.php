<?php

namespace App\Http\Controllers\API\Sport;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sport\SportPostResource;
use App\Models\SportPost;


class PostController extends Controller
{
    public function __invoke()
    {
        $SportPost = SportPost::all();
        return  SportPostResource::collection($SportPost);
    }
}
