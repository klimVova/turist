<?php

namespace App\Http\Controllers\HostelShow;

use App\Http\Controllers\Controller;
use App\Models\HostelCard;
use App\Models\HostelPost;
use Illuminate\Support\Facades\DB;

class ImagesController extends Controller
{
    public function __invoke(HostelPost $hostelPost)
    {
        $images =  DB::table('hostel_images')->where('hostel_post_id', '=', $hostelPost->id)->get();
        return view('hostelShow.images', compact('images'));
    }
}