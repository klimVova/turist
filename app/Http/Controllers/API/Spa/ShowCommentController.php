<?php

namespace App\Http\Controllers\API\Spa;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Spa\CommentRequest;
use App\Http\Resources\Spa\SpaCommentResource;
use App\Models\SpaCard;
use Illuminate\Support\Facades\DB;


class ShowCommentController extends Controller
{
    public function __invoke(CommentRequest $request, SpaCard $spaCard)
    {
        $data = $request->validated();
        $comment = DB::table('comment_spas')->where('spaCard_id', '=', $spaCard->id)->
        orderBy('id', 'desc')->
        paginate(4 , ['*'],'page',$data['page']);
        return SpaCommentResource::collection($comment);
    }
}
