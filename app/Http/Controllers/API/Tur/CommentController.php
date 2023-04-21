<?php

namespace App\Http\Controllers\API\Tur;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Tur\CommentStoreRequest;
use App\Models\CommentTur;
use App\Models\TuroperatorCard;

use function response;

class CommentController extends Controller
{
    public function __invoke(CommentStoreRequest $request , TuroperatorCard $turCard)
    {
        $data = $request->validated();
        $comment = CommentTur::create($data);
        return response([]);
    }
}
