<?php

namespace App\Http\Controllers\Sport\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\Post\UpdateRequest;
use App\Models\SportPost;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SportPost $sportPost)
    {
        $data = $request->validated();

        if (isset($data['sport_preview_image'])) {
            $data['sport_preview_image'] = Storage::disk('public')->put('/sport_images', $data['sport_preview_image']);
        }
        if (isset($data['sport_tag_ids'])) {
            $sport_tagIds = $data['sport_tag_ids'];
            unset($data['sport_tag_ids']);
        }
        $sportPost->update($data);

        if (isset($sport_tagIds)) {
            $sportPost->tags()->sync($sport_tagIds);
        }

        $sportPosts = auth()->user()->sportPosts;
        return view('sport.post.index' , compact('sportPost','sportPosts'));
    }
}
