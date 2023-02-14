<?php

namespace App\Http\Controllers\API\Cafe;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Cafe\CommentRequest;
use App\Http\Resources\Cafe\CafeCommentResource;
use App\Models\CafeCard;
use Illuminate\Support\Facades\DB;


class ShowCommentController extends Controller
{
    public function __invoke(CommentRequest $request, CafeCard $cafeCard)
    {
        $data = $request->validated();
        $comment = DB::table('comment_cafes')->where('cafeCard_id', '=', $cafeCard->id)->
        orderBy('id', 'desc')->
        paginate(4 , ['*'],'page',$data['page']);
        return CafeCommentResource::collection($comment);
    }
}
