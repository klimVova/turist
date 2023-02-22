<?php

namespace App\Http\Controllers\Sanatorium\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\Post\StoreRequest;
use App\Models\SanatoriumImage;
use App\Models\SanatoriumPost;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        if (isset($data['sanatorium_tag_ids'])) {
            $sanatorium_tagIds = $data['sanatorium_tag_ids'];
            unset($data['sanatorium_tag_ids']);
        }
        $data['sanatorium_preview_image'] = Storage::disk('public')->put('/sanatorium_images', $data['sanatorium_preview_image']);
        $sanatoriumPost = SanatoriumPost::firstOrCreate($data);
        if ($request->has('main_image')){
            foreach ($request->file('main_image') as $image){
                $imageName = $data['title'].'-main_image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('storage/sanatorium_post_images'),$imageName);
                SanatoriumImage::create([
                    'sanatorium_post_id' =>$sanatoriumPost->id,
                    'images' =>$imageName
                ]);
            }
        }
        if (isset($sanatorium_tagIds)) {
            $sanatoriumPost->tags()->attach($sanatorium_tagIds);
        }
        return redirect()->route('sanatorium.post.index');
    }
}
