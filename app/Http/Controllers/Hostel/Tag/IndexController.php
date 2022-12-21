<?php

namespace App\Http\Controllers\Hostel\Tag;

use App\Http\Controllers\Controller;
use App\Models\HostelTag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $hostelTags =  auth()->user()->hostelTags ;
        return view('hostel.tag.index', compact('hostelTags'));
    }
}
