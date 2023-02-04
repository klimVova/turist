<?php

namespace App\Http\Controllers\Hostel\TagCard;

use App\Http\Controllers\Controller;
use App\Models\HostelCardTag;
use App\Models\HostelCategory;
use App\Models\HostelTagCard;

class ShowController extends Controller
{
    public function __invoke(HostelCardTag $hostelCardTag)
    {
        return view('hostel.tagCard.show', compact('hostelCardTag'));
    }
}
