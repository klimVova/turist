<?php

namespace App\Http\Controllers\API\Medical;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Medical\CommentRequest;
use App\Http\Resources\Medical\MedicalCommentResource;
use App\Models\MedicalCard;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ShowCommentController extends Controller
{
    public function __invoke(CommentRequest $request, MedicalCard $medicalCard)
    {
        $data = $request->validated();
        $comment = DB::table('comment_meds')->where('medicalCard_id', '=', $medicalCard->id)->
        orderBy('id', 'desc')->
        paginate(4 , ['*'],'page',$data['page']);
        return MedicalCommentResource::collection($comment);
    }
}
