<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends BaseController
{
    public function __invoke(Post $post){
        $images =  DB::table('images')->where('post_id', '=', $post->id)->get();
        $categories = Category::all();
        $tags = Tag::all();
        $user = Auth::id();
        return view('admin.post.image', compact('post','images', 'user', 'categories','tags'));
    }
}
