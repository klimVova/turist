<?php

namespace App\Http\Controllers\Hostel\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Card\StoreRequest;
use App\Models\HostelCard;
use App\Models\HostelImage;
use App\Models\HostelPost;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        $data['preview_image'] = Storage::disk('public')->put('/hostel_images_card', $data['preview_image']);
        HostelCard::firstOrCreate($data);
        return redirect()->route('hostel.card.index');
    }
}
