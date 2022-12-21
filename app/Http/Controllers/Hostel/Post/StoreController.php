<?php

namespace App\Http\Controllers\Hostel\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Post\StoreRequest;
use App\Models\HostelImage;
use App\Models\HostelPost;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        if (isset($data['hostel_tag_ids'])) {
            $hostel_tagIds = $data['hostel_tag_ids'];
            unset($data['hostel_tag_ids']);
        }
        $data['hostel_preview_image'] = Storage::disk('public')->put('/hostel_images', $data['hostel_preview_image']);
        $hostelPost = HostelPost::firstOrCreate($data);
        if ($request->has('main_image')){
            foreach ($request->file('main_image') as $image){
                $imageName = $data['title'].'-main_image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('storage/hostel_post_images'),$imageName);
                HostelImage::create([
                    'hostel_post_id' =>$hostelPost->id,
                    'images' =>$imageName
                ]);
            }
        }
        if (isset($hostel_tagIds)) {
            $hostelPost->tags()->attach($hostel_tagIds);
        }
        return redirect()->route('hostel.post.index');
    }
}
