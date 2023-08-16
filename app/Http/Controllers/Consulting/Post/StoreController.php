<?php

namespace App\Http\Controllers\Consulting\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Consulting\Post\StoreRequest;
use App\Models\ConsultingPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request , $id)
    {
        $data = $request->validated();
        $user = Auth::id();

        $data['preview_image'] = Storage::disk('public')->put('/consulting_images_post', $data['preview_image']);
        $consultingPost= ConsultingPost::firstOrCreate($data);

        return to_route('consulting.card.index',['id' => $id],$status = 302, compact('user'));
    }
}
