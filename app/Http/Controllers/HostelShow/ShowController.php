<?php

namespace App\Http\Controllers\HostelShow;

use App\Http\Controllers\Controller;
use App\Models\HostelCard;
use App\Models\HostelPost;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function __invoke(HostelCard $hostelCard)
    {

        $posts =  DB::table('hostel_posts')->where('user_id', '=', $hostelCard->user_id)->get();
        $images =  DB::table('hostel_images')->where('hostel_post_id', '=', $hostelCard->hostel_post_id)->get();
        return view('hostelShow.show', compact('hostelCard', 'posts', 'images'));
    }
}