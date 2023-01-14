<?php

namespace App\Http\Controllers\Spa\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spa\Card\UpdateRequest;
use App\Models\SpaCard;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SpaCard $spaCard)
    {
        $data = $request->validated();
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/spa_images_card', $data['preview_image']);
        }
        if (isset($data['logo'])) {
            $data['logo'] = Storage::disk('public')->put('/spa_images_card', $data['logo']);
        }
        if (isset($data['spa_tag_ids'])) {
            $spa_tagIds = $data['spa_tag_ids'];
            unset($data['spa_tag_ids']);
        }
        $spaCard->update($data);
        if (isset($spa_tagIds)) {
            $spaCard->spaTags()->sync($spa_tagIds);
        }
        return redirect()->route('spa.card.index');
    }
}
