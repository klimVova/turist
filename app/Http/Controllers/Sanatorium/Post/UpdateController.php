<?php

namespace App\Http\Controllers\Sanatorium\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\Post\UpdateRequest;
use App\Models\SanatoriumPost;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SanatoriumPost $sanatoriumPost)
    {
        $data = $request->validated();

        if (isset($data['sanatorium_preview_image'])) {
            $data['sanatorium_preview_image'] = Storage::disk('public')->put('/sanatorium_images', $data['sanatorium_preview_image']);
        }
        if (isset($data['sanatorium_tag_ids'])) {
            $sanatorium_tagIds = $data['sanatorium_tag_ids'];
            unset($data['sanatorium_tag_ids']);
        }
        $sanatoriumPost->update($data);

        if (isset($sanatorium_tagIds)) {
            $sanatoriumPost->tags()->sync($sanatorium_tagIds);
        }

        $sanatoriumPosts = auth()->user()->sanatoriumPosts;
        return view('sanatorium.post.index' , compact('sanatoriumPost','sanatoriumPosts'));
    }
}
