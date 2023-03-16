<?php

namespace App\Http\Controllers\Turoperator\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Card\StoreRequest;
use App\Models\TuroperatorCard;
use App\Models\TuroperatorCardImage;
use App\Models\TuroperatorImage;
use App\Models\TuroperatorPost;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['turoperator_cardTag_ids'])) {
            $turoperator_tagIds = $data['turoperator_cardTag_ids'];
            unset($data['turoperator_cardTag_ids']);
        }
        $data['preview_image'] = Storage::disk('public')->put('/turoperator_images_card', $data['preview_image']);
        $data['logo'] = Storage::disk('public')->put('/turoperator_images_card', $data['logo']);
        $turoperatorCard = TuroperatorCard::firstOrCreate($data);
        if ($request->has('main_image')){
            foreach ($request->file('main_image') as $image){
                $imageName = $data['title'].'-main_image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('storage/turoperator_card_images'),$imageName);
                TuroperatorCardImage::create([
                    'turoperator_card_id' =>$turoperatorCard->id,
                    'images' =>$imageName
                ]);
            }
        }
        if (isset($turoperator_tagIds)) {
            $turoperatorCard->tags()->attach($turoperator_tagIds);
        }
        return redirect()->route('turoperator.card.index');
    }
}
