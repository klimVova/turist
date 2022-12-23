<?php

namespace App\Http\Controllers\Cafe\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Post\UpdateRequest;
use App\Models\CafePost;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CafePost $cafePost)
    {
        $data = $request->validated();
        $cafePost->update($data);
        $cafePosts = auth()->user()->cafePosts;
        return view('cafe.post.index' , compact('cafePost','cafePosts'));
    }
}
