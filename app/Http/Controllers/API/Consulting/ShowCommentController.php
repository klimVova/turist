<?php

namespace App\Http\Controllers\API\Consulting;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Consulting\CommentRequest;
use App\Http\Resources\Consulting\ConsultingCommentResource;
use App\Models\ConsultingPost;
use Illuminate\Support\Facades\DB;


class ShowCommentController extends Controller
{
    public function __invoke(CommentRequest $request, ConsultingPost $consultingPost)
    {
        $data = $request->validated();
        $comment = DB::table('comment_consultings')->where('constalingCard_id', '=', $consultingPost->id)->
        orderBy('id', 'desc')->
        paginate(4 , ['*'],'page',$data['page']);
        return ConsultingCommentResource::collection($comment);
    }
}
