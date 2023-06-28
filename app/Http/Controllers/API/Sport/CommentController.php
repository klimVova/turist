<?php

namespace App\Http\Controllers\API\Sport;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Sport\CommentStoreRequest;
use App\Models\CommentSport;
use App\Models\SportCard;
use function response;

class CommentController extends Controller
{
    public function __invoke(CommentStoreRequest $request , SportCard $sportCard)
    {
        $data = $request->validated();
        $comment = CommentSport::create($data);
        return response([]);
    }
}
