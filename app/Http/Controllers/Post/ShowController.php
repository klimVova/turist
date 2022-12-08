<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function __invoke( Post $post, User $user)
    {
        $images =  DB::table('images')->where('post_id', '=', $post->id)->get();
        $posts =  DB::table('posts')->where('user_id', '=', $post->user_id)->get();
        return view('post.show',compact('post', 'posts','images'));
    }
}