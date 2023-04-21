<?php

namespace App\Http\Controllers\API\Tur;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tur\TurPostResource;


use App\Models\SanatoriumPost;
use App\Models\TuroperatorPost;


class PostController extends Controller
{
    public function __invoke()
    {
        $turPost = TuroperatorPost::all();
        return  TurPostResource::collection($turPost);
    }
}
