<?php

namespace App\Http\Controllers\Sanatorium\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\Card\StoreRequest;
use App\Models\SanatoriumCard;
use App\Models\SanatoriumCardImage;
use App\Models\SanatoriumImage;
use App\Models\SanatoriumPost;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if (isset($data['sanatorium_cardTag_ids'])) {
            $sanatorium_tagIds = $data['sanatorium_cardTag_ids'];
            unset($data['sanatorium_cardTag_ids']);
        }
        $data['preview_image'] = Storage::disk('public')->put('/sanatorium_images_card', $data['preview_image']);
        $data['logo'] = Storage::disk('public')->put('/sanatorium_images_card', $data['logo']);
        $sanatoriumCard = SanatoriumCard::firstOrCreate($data);
        if ($request->has('main_image')){
            foreach ($request->file('main_image') as $image){
                $imageName = $data['title'].'-main_image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('storage/sanatorium_card_images'),$imageName);
                SanatoriumCardImage::create([
                    'sanatorium_card_id' =>$sanatoriumCard->id,
                    'images' =>$imageName
                ]);
            }
        }
        if (isset($sanatorium_tagIds)) {
            $sanatoriumCard->tags()->attach($sanatorium_tagIds);
        }
        return redirect()->route('sanatorium.card.index');
    }
}
