<?php

namespace App\Service;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data,$request)
    {

        try {
            Db::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }


            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
           // $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            $new_post = Post::firstOrCreate($data);

            if ($request->has('main_image')){
                foreach ($request->file('main_image') as $image){
                    $imageName = $data['title'].'-main_image-'.time().rand(1,1000).'.'.$image->extension();
                    $image->move(public_path('storage/post_images'),$imageName);
                    Image::create([
                        'post_id' =>$new_post->id,
                        'images' =>$imageName
                    ]);
                }
            }
            //$post = Post::firstOrCreate($data);
            if (isset($tagIds)) {
                $new_post->tags()->attach($tagIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            Db::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('storage/post_images', $data['main_image']);
            }
            $post->update($data);
            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $post;
    }
}