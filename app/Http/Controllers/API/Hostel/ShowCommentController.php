<?php

namespace App\Http\Controllers\API\Hostel;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Hostel\CommentRequest;
use App\Http\Resources\Hostel\HostelCommentResource;
use App\Models\HostelCard;
use Illuminate\Support\Facades\DB;


class ShowCommentController extends Controller
{
    public function __invoke(CommentRequest $request, HostelCard $hostelCard)
    {
        $data = $request->validated();
        $comment = DB::table('comment_hostels')->where('hostelCard_id', '=', $hostelCard->id)->
        orderBy('id', 'desc')->
        paginate(4 , ['*'],'page',$data['page']);
        return HostelCommentResource::collection($comment);
    }
}
