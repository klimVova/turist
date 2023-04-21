<?php

namespace App\Http\Controllers\API\Tur;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Tur\CommentRequest;
use App\Http\Resources\Tur\TurCommentResource;

use App\Models\TuroperatorCard;
use Illuminate\Support\Facades\DB;


class ShowCommentController extends Controller
{
    public function __invoke(CommentRequest $request, TuroperatorCard $turCard)
    {
        $data = $request->validated();
        $comment = DB::table('comment_turs')->where('turCard_id', '=', $turCard->id)->
        orderBy('id', 'desc')->
        paginate(4 , ['*'],'page',$data['page']);
        return TurCommentResource::collection($comment);
    }
}
