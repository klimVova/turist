<?php

namespace App\Http\Controllers\Spa\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spa\Card\StoreRequest;
use App\Models\HostelCardImage;
use App\Models\SpaCard;
use App\Models\SpaCardImage;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        if (isset($data['spa_tag_ids'])) {
            $spa_tagIds = $data['spa_tag_ids'];
            unset($data['spa_tag_ids']);
        }
        $data['preview_image'] = Storage::disk('public')->put('/spa_images_card', $data['preview_image']);
        $data['logo'] = Storage::disk('public')->put('/spa_images_card', $data['logo']);
        $spaCard = SpaCard::firstOrCreate($data);
        if ($request->has('main_image')){
            foreach ($request->file('main_image') as $image){
                $imageName = $data['title'].'-main_image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('storage/spa_card_images'),$imageName);
                SpaCardImage::create([
                    'spa_card_id' =>$spaCard->id,
                    'images' =>$imageName
                ]);
            }
        }
        if (isset($spa_tagIds)) {
            $spaCard->spaTags()->attach($spa_tagIds);
        }
        return redirect()->route('spa.card.index');
    }
}
