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
        $hostelCard->update($data);
       // dd($hostelCard);
        return back();
    }
}
