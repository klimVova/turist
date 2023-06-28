<?php

namespace App\Http\Controllers\Sport\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\Card\UpdateRequest;
use App\Models\SportCard;
use App\Models\SportCategory;
use App\Models\SportPost;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SportCard $sportCard)
    {
        $data = $request->validated();
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/sport_images_card', $data['preview_image']);
        }
        if (isset($data['logo'])) {
            $data['logo'] = Storage::disk('public')->put('/sport_images_card', $data['logo']);
        }
        if (isset($data['sport_cardTag_ids'])) {
            $sport_tagIds = $data['sport_cardTag_ids'];
            unset($data['sport_cardTag_ids']);
        }
        $sportCard->update($data);

        if (isset($sport_tagIds)) {
            $sportCard->tags()->sync($sport_tagIds);
        }

        return redirect()->route('sport.card.index');
    }
}
