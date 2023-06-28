<?php

namespace App\Http\Controllers\API\Sport;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Sport\CommentRequest;
use App\Http\Resources\Sport\SportCommentResource;
use App\Models\SportCard;
use Illuminate\Support\Facades\DB;


class ShowCommentController extends Controller
{
    public function __invoke(CommentRequest $request, SportCard $sportCard)
    {
        $data = $request->validated();
        $comment = DB::table('comment_sports')->where('sportCard_id', '=', $sportCard->id)->
        orderBy('id', 'desc')->
        paginate(4 , ['*'],'page',$data['page']);
        return SportCommentResource::collection($comment);
    }
}
