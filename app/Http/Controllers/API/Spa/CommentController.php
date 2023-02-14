<?php

namespace App\Http\Controllers\API\Spa;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Spa\CommentStoreRequest;
use App\Models\CommentSpa;
use App\Models\SpaCard;
use function response;

class CommentController extends Controller
{
    public function __invoke(CommentStoreRequest $request , SpaCard $spaCard)
    {
        $data = $request->validated();
        $comment = CommentSpa::create($data);
        return response([]);
    }
}