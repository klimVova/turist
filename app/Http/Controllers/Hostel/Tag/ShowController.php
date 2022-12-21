<?php

namespace App\Http\Controllers\Hostel\Tag;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;
use App\Models\HostelTag;

class ShowController extends Controller
{
    public function __invoke(HostelTag $hostelTag)
    {
        return view('hostel.tag.show', compact('hostelTag'));
    }
}
