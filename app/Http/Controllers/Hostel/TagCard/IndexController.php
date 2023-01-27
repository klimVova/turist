<?php

namespace App\Http\Controllers\Hostel\TagCard;

use App\Http\Controllers\Controller;
use App\Models\HostelTagCard;

class IndexController extends Controller
{
    public function __invoke()
    {
        $hostelCardTags =  auth()->user()->hostelCardTag;
        return view('hostel.tagCard.index', compact('hostelCardTags'));
    }
}
