<?php

namespace App\Http\Controllers\Cafe\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Card\StoreRequest;
use App\Models\CafeCard;
use App\Models\CafeCardImage;
use App\Models\HostelCardImage;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        if (isset($data['cafe_tag_ids'])) {
            $cafe_tagIds = $data['cafe_tag_ids'];
            unset($data['cafe_tag_ids']);
        }
        $data['preview_image'] = Storage::disk('public')->put('/cafe_images_card', $data['preview_image']);
        $data['logo'] = Storage::disk('public')->put('/cafe_images_card', $data['logo']);
        $cafeCard = CafeCard::firstOrCreate($data);
        if ($request->has('main_image')){
            foreach ($request->file('main_image') as $image){
                $imageName = $data['title'].'-main_image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('storage/cafe_card_images'),$imageName);
                CafeCardImage::create([
                    'cafe_card_id' =>$cafeCard->id,
                    'images' =>$imageName
                ]);
            }
        }
        if (isset($cafe_tagIds)) {
                 $cafeCard->cafeTags()->attach($cafe_tagIds);
             }
        return redirect()->route('cafe.card.index');
    }
}
