<?php

namespace App\Http\Controllers\Hostel\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function __invoke(HostelPost $hostelPost){
        $images =  DB::table('hostel_images')->where('hostel_post_id', '=', $hostelPost->id)->get();
        $hostelCategories = HostelCategory::all();
        $user = Auth::id();
        return view('hostel.post.image', compact('hostelPost','images', 'user', 'hostelCategories'));
    }
}
