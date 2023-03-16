<?php

namespace App\Http\Controllers\Turoperator\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Post\StoreRequest;
use App\Models\TuroperatorImage;
use App\Models\TuroperatorPost;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        if (isset($data['turoperator_tag_ids'])) {
            $turoperator_tagIds = $data['turoperator_tag_ids'];
            unset($data['turoperator_tag_ids']);
        }
        $data['turoperator_preview_image'] = Storage::disk('public')->put('/turoperator_images', $data['turoperator_preview_image']);
        $turoperatorPost = TuroperatorPost::firstOrCreate($data);
        if ($request->has('main_image')){
            foreach ($request->file('main_image') as $image){
                $imageName = $data['title'].'-main_image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('storage/turoperator_post_images'),$imageName);
                TuroperatorImage::create([
                    'turoperator_post_id' =>$turoperatorPost->id,
                    'images' =>$imageName
                ]);
            }
        }
        if (isset($turoperator_tagIds)) {
            $turoperatorPost->tags()->attach($turoperator_tagIds);
        }
        return redirect()->route('turoperator.post.index');
    }
}
