<?php

namespace App\Http\Controllers\Sanatorium\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumPost;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function __invoke(SanatoriumPost $sanatoriumPost){
        $images =  DB::table('sanatorium_images')->where('sanatorium_post_id', '=', $sanatoriumPost->id)->get();
        $sanatoriumCategories = SanatoriumCategory::all();
        $user = Auth::id();
        return view('sanatorium.post.image', compact('sanatoriumPost','images', 'user', 'sanatoriumCategories'));
    }
}
