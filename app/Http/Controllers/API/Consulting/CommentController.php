<?php

namespace App\Http\Controllers\API\Consulting;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Consulting\CommentStoreRequest;
use App\Models\CommentConsulting;
use App\Models\ConsultingPost;
use function response;

class CommentController extends Controller
{
    public function __invoke(CommentStoreRequest $request , ConsultingPost $consultingPost)
    {
        $data = $request->validated();
        $comment = CommentConsulting::create($data);
        return response([]);
    }
}
