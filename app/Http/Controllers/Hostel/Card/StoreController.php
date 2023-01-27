<?php

namespace App\Http\Controllers\Hostel\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Card\StoreRequest;
use App\Models\HostelCard;
use App\Models\HostelCardImage;
use App\Models\HostelImage;
use App\Models\HostelPost;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if (isset($data['hostel_cardTag_ids'])) {
            $hostel_tagIds = $data['hostel_cardTag_ids'];
            unset($data['hostel_cardTag_ids']);
        }
        $data['preview_image'] = Storage::disk('public')->put('/hostel_images_card', $data['preview_image']);
        $data['logo'] = Storage::disk('public')->put('/hostel_images_card', $data['logo']);
        $hostelCard = HostelCard::firstOrCreate($data);
        if ($request->has('main_image')){
            foreach ($request->file('main_image') as $image){
                $imageName = $data['title'].'-main_image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('storage/hostel_card_images'),$imageName);
                HostelCardImage::create([
                    'hostel_card_id' =>$hostelCard->id,
                    'images' =>$imageName
                ]);
            }
        }
        if (isset($hostel_tagIds)) {
            $hostelCard->tags()->attach($hostel_tagIds);
        }
        return redirect()->route('hostel.card.index');
    }
}
