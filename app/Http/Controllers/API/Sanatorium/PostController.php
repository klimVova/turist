<?php

namespace App\Http\Controllers\API\Sanatorium;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sanatorium\SanatoriumPostResource;
use App\Http\Resources\Sanatorium\SanatoriumServicResource;
use App\Models\SanatoriumPost;
use App\Models\SanatoriumServic;


class PostController extends Controller
{
    public function __invoke()
    {
        $sanatoriumPost = SanatoriumPost::all();
        return  SanatoriumPostResource::collection($sanatoriumPost);
    }
}
