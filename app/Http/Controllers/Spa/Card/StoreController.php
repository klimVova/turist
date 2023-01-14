<?php

namespace App\Http\Controllers\Spa\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spa\Card\StoreRequest;
use App\Models\SpaCard;
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
        if (isset($spa_tagIds)) {
            $spaCard->spaTags()->attach($spa_tagIds);
        }
        return redirect()->route('spa.card.index');
    }
}
