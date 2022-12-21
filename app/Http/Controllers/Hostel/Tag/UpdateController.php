<?php

namespace App\Http\Controllers\Hostel\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Category\UpdateRequest;
use App\Models\HostelCategory;
use App\Models\HostelTag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, HostelTag $hostelTag)
    {
        $data = $request->validated();
        $hostelTag->update($data);
        return view('hostel.tag.show' , compact('hostelTag'));
    }
}
