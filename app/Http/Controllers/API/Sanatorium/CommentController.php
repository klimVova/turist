<?php

namespace App\Http\Controllers\API\Sanatorium;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Sanatorium\CommentStoreRequest;
use App\Models\CommentSanatorium;
use App\Models\SanatoriumCard;
use function response;

class CommentController extends Controller
{
    public function __invoke(CommentStoreRequest $request , SanatoriumCard $hostelCard)
    {
        $data = $request->validated();
        $comment = CommentSanatorium::create($data);
        return response([]);
    }
}