<?php

namespace App\Http\Controllers\Hostel\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Post\UpdateRequest;
use App\Models\HostelCategory;
use App\Models\HostelPost;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, HostelPost $hostelPost)
    {
        $data = $request->validated();
        $hostelPost->update($data);
        $hostelPosts = HostelPost::all();
        return view('hostel.post.index' , compact('hostelPost','hostelPosts'));
    }
}
