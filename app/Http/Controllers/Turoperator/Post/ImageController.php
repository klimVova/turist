<?php

namespace App\Http\Controllers\Turoperator\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TuroperatorCategory;
use App\Models\TuroperatorPost;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function __invoke(TuroperatorPost $turoperatorPost){
        $images =  DB::table('turoperator_images')->where('turoperator_post_id', '=', $turoperatorPost->id)->get();
        $turoperatorCategories = TuroperatorCategory::all();
        $user = Auth::id();
        return view('turoperator.post.image', compact('turoperatorPost','images', 'user', 'turoperatorCategories'));
    }
}
