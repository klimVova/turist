<?php

namespace App\Http\Controllers\API\Tur;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class DeleteCommentController extends Controller
{
    public function __invoke($id)
    {
        $comment = DB::table('comment_turs')->where('id', '=', $id)->delete();
        return response([$id]);
    }
}
