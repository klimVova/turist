<?php

namespace App\Http\Controllers\Hostel\Tag;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;
use App\Models\HostelTag;

class EditController extends Controller
{
    public function __invoke(HostelTag $hostelTag)
    {
        return view('hostel.tag.edit' , compact('hostelTag'));
    }
}
