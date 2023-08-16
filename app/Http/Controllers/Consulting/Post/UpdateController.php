<?php

namespace App\Http\Controllers\Consulting\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Consulting\Post\UpdateRequest;
use App\Models\ConsultingPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, ConsultingPost $consultingPost)
    {
        $data = $request->validated();

        $user = Auth::id();
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/consulting_images_post', $data['preview_image']);
        }
        $consultingPost->update($data);
        return to_route('consulting.card.index',['id' => $consultingPost['cat_id']],$status = 302, compact('user'));
    }
}
