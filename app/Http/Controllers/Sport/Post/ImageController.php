<?php

namespace App\Http\Controllers\Sport\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SportCategory;
use App\Models\SportPost;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function __invoke(SportPost $sportPost){
        $images =  DB::table('sport_images')->where('sport_post_id', '=', $sportPost->id)->get();
        $sportCategories = SportCategory::all();
        $user = Auth::id();
        return view('sport.post.image', compact('sportPost','images', 'user', 'sportCategories'));
    }
}
