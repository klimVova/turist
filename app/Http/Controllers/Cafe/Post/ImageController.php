<?php

namespace App\Http\Controllers\Cafe\Post;

use App\Http\Controllers\Controller;
use App\Models\CafeCategory;
use App\Models\CafePost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function __invoke(CafePost $cafePost){
        $images =  DB::table('cafe_images')->where('cafe_post_id', '=', $cafePost->id)->get();
        $cafeCategories = cafeCategory::all();
        $user = Auth::id();
        return view('cafe.post.image', compact('cafePost','images', 'user', 'cafeCategories'));
    }
}
