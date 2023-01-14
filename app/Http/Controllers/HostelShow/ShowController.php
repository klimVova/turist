<?php

namespace App\Http\Controllers\HostelShow;

use App\Http\Controllers\Controller;
use App\Models\HostelCard;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function __invoke(HostelCard $hostelCard, User $user)
    {
        $posts =  DB::table('hostel_posts')->where('user_id', '=', $hostelCard->user_id)->get();
        $categories = DB::table('hostel_categories')->where('user_id', '=', $hostelCard->user_id)->get();
        return view('hostelShow.show', compact('hostelCard', 'posts', 'categories'));
    }
}