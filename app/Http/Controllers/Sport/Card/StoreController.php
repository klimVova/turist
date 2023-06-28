<?php

namespace App\Http\Controllers\Sport\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\Card\StoreRequest;
use App\Models\SportCard;
use App\Models\SportCardImage;
use App\Models\SportImage;
use App\Models\SportPost;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if (isset($data['sport_cardTag_ids'])) {
            $sport_tagIds = $data['sport_cardTag_ids'];
            unset($data['sport_cardTag_ids']);
        }
        $data['preview_image'] = Storage::disk('public')->put('/sport_images_card', $data['preview_image']);
        $data['logo'] = Storage::disk('public')->put('/sport_images_card', $data['logo']);
        $sportCard = SportCard::firstOrCreate($data);
        if ($request->has('main_image')){
            foreach ($request->file('main_image') as $image){
                $imageName = $data['title'].'-main_image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('storage/sport_card_images'),$imageName);
                SportCardImage::create([
                    'sport_card_id' =>$sportCard->id,
                    'images' =>$imageName
                ]);
            }
        }
        if (isset($sport_tagIds)) {
            $sportCard->tags()->attach($sport_tagIds);
        }
        return redirect()->route('sport.card.index');
    }
}
