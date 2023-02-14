<?php

namespace App\Http\Controllers\API\Cafe;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Cafe\CommentStoreRequest;
use App\Models\CommentCafe;
use App\Models\CafeCard;
use function response;

class CommentController extends Controller
{
    public function __invoke(CommentStoreRequest $request , CafeCard $cafeCard)
    {
        $data = $request->validated();
        $comment = CommentCafe::create($data);
        return response([]);
    }
}