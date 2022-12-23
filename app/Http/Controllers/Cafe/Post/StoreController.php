<?php

namespace App\Http\Controllers\Cafe\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Post\StoreRequest;
use App\Models\CafePost;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        $cafePost = CafePost::firstOrCreate($data);
        return redirect()->route('cafe.post.index');
    }
}
