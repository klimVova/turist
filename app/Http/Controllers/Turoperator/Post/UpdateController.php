<?php

namespace App\Http\Controllers\Turoperator\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Post\UpdateRequest;
use App\Models\TuroperatorPost;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, TuroperatorPost $turoperatorPost)
    {
        $data = $request->validated();

        if (isset($data['turoperator_preview_image'])) {
            $data['turoperator_preview_image'] = Storage::disk('public')->put('/turoperator_images', $data['turoperator_preview_image']);
        }
        if (isset($data['turoperator_tag_ids'])) {
            $turoperator_tagIds = $data['turoperator_tag_ids'];
            unset($data['turoperator_tag_ids']);
        }
        $turoperatorPost->update($data);

        if (isset($turoperator_tagIds)) {
            $turoperatorPost->tags()->sync($turoperator_tagIds);
        }

        $turoperatorPosts = auth()->user()->turoperatorPosts;
        return view('turoperator.post.index' , compact('turoperatorPost','turoperatorPosts'));
    }
}
