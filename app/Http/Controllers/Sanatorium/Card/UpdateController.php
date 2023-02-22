<?php

namespace App\Http\Controllers\Sanatorium\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\Card\UpdateRequest;
use App\Models\SanatoriumCard;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumPost;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SanatoriumCard $sanatoriumCard)
    {
        $data = $request->validated();
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/sanatorium_images_card', $data['preview_image']);
        }
        if (isset($data['logo'])) {
            $data['logo'] = Storage::disk('public')->put('/sanatorium_images_card', $data['logo']);
        }
        if (isset($data['sanatorium_cardTag_ids'])) {
            $sanatorium_tagIds = $data['sanatorium_cardTag_ids'];
            unset($data['sanatorium_cardTag_ids']);
        }
        $sanatoriumCard->update($data);

        if (isset($sanatorium_tagIds)) {
            $sanatoriumCard->tags()->sync($sanatorium_tagIds);
        }

        return redirect()->route('sanatorium.card.index');
    }
}
