<?php

namespace App\Http\Controllers\Hostel\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Post\UpdateRequest;
use App\Models\HostelPost;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, HostelPost $hostelPost)
    {
        $data = $request->validated();

        if (isset($data['hostel_preview_image'])) {
            $data['hostel_preview_image'] = Storage::disk('public')->put('/hostel_images', $data['hostel_preview_image']);
        }
        $hostelPost->update($data);
        $hostelPosts = auth()->user()->hostelPosts;
        return view('hostel.post.index' , compact('hostelPost','hostelPosts'));
    }
}
