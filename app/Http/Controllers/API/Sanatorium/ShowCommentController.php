<?php

namespace App\Http\Controllers\API\Sanatorium;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Sanatorium\CommentRequest;
use App\Http\Resources\Sanatorium\SanatoriumCommentResource;
use App\Models\SanatoriumCard;
use Illuminate\Support\Facades\DB;


class ShowCommentController extends Controller
{
    public function __invoke(CommentRequest $request, SanatoriumCard $sanatoriumCard)
    {
        $data = $request->validated();
        $comment = DB::table('comment_sanatoriums')->where('sanatoriumCard_id', '=', $sanatoriumCard->id)->
        orderBy('id', 'desc')->
        paginate(4 , ['*'],'page',$data['page']);
        return SanatoriumCommentResource::collection($comment);
    }
}
