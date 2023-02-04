<?php

namespace App\Http\Controllers\Hostel\TagCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Category\StoreRequest;
use App\Models\HostelCardTag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        HostelCardTag::firstOrCreate($data);
        return redirect()->route('hostel.tagCard.index');
    }
}
