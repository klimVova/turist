<?php

namespace App\Http\Controllers\Cafe\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Card\UpdateRequest;
use App\Models\CafeCard;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CafeCard $cafeCard)
    {
        $data = $request->validated();
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/cafe_images_card', $data['preview_image']);
        }
        if (isset($data['logo'])) {
            $data['logo'] = Storage::disk('public')->put('/cafe_images_card', $data['logo']);
        }
        if (isset($data['cafe_tag_ids'])) {
            $cafe_tagIds = $data['cafe_tag_ids'];
            unset($data['cafe_tag_ids']);
        }
        $cafeCard->update($data);
        if (isset($cafe_tagIds)) {
            $cafeCard->cafeTags()->sync($cafe_tagIds);
        }
        return redirect()->route('cafe.card.index');
    }
}
