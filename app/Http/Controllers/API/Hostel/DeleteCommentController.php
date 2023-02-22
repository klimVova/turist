<?php

namespace App\Http\Controllers\API\Hostel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class DeleteCommentController extends Controller
{
    public function __invoke($id)
    {
        $comment = DB::table('comment_hostels')->where('id', '=', $id)->delete();
        return response([$id]);
    }
}
