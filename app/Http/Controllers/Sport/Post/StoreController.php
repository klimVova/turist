<?php

namespace App\Http\Controllers\Sport\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\Post\StoreRequest;
use App\Models\SportImage;
use App\Models\SportPost;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        if (isset($data['sport_tag_ids'])) {
            $sport_tagIds = $data['sport_tag_ids'];
            unset($data['sport_tag_ids']);
        }
        $data['sport_preview_image'] = Storage::disk('public')->put('/sport_images', $data['sport_preview_image']);
        $sportPost = SportPost::firstOrCreate($data);
        if ($request->has('main_image')){
            foreach ($request->file('main_image') as $image){
                $imageName = $data['title'].'-main_image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('storage/sport_post_images'),$imageName);
                SportImage::create([
                    'sport_post_id' =>$sportPost->id,
                    'images' =>$imageName
                ]);
            }
        }
        if (isset($sport_tagIds)) {
            $sportPost->tags()->attach($sport_tagIds);
        }
        return redirect()->route('sport.post.index');
    }
}
