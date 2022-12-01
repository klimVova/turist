<?php

namespace App\Http\Controllers\Hostel\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Post\StoreRequest;
use App\Models\HostelPost;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        HostelPost::firstOrCreate($data);
        return redirect()->route('hostel.post.index');
    }
}
