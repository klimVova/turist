<?php

namespace App\Http\Controllers\Hostel\TagCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Category\UpdateRequest;
use App\Models\HostelCardTag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, HostelCardTag $hostelCardTag)
    {
        $data = $request->validated();
        $hostelCardTag->update($data);
        return view('hostel.tagCard.show' , compact('hostelCardTag'));
    }
}
