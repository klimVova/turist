<?php

namespace App\Http\Controllers\Hostel\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Card\UpdateRequest;
use App\Models\HostelCard;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, HostelCard $hostelCard)
    {
        $data = $request->validated();
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/hostel_images_card', $data['preview_image']);
        }
        if (isset($data['logo'])) {
            $data['logo'] = Storage::disk('public')->put('/hostel_images_card', $data['logo']);
        }
        if (isset($data['hostel_cardTag_ids'])) {
            $hostel_tagIds = $data['hostel_cardTag_ids'];
            unset($data['hostel_cardTag_ids']);
        }
        $hostelCard->update($data);
        if (isset($hostel_tagIds)) {
            $hostelCard->tags()->sync($hostel_tagIds);
        }
        return redirect()->route('hostel.card.index');
    }
}
