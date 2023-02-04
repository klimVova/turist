<?php

namespace App\Http\Controllers\Medical\Card;

use App\Http\Controllers\Controller;
use App\Http\Resources\Medical\CommentResource;
use App\Models\CommentMed;

class IndexCommentController extends Controller
{
    public function __invoke()
    {
        $comment = CommentMed::all();
        return CommentResource::collection($comment);
    }
}
