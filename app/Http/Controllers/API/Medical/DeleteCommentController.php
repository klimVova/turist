<?php

namespace App\Http\Controllers\API\Medical;

use App\Http\Controllers\Controller;
use App\Http\Resources\Medical\MedicalCommentResource;
use App\Models\CommentMed;
use Illuminate\Support\Facades\DB;


class DeleteCommentController extends Controller
{
    public function __invoke($id)
    {
        $comment = DB::table('comment_meds')->where('id', '=', $id)->delete();
        return response([$id]);
    }
}
