<?php

namespace App\Http\Controllers\Hostel\Tag;

use App\Http\Controllers\Controller;
use App\Models\HostelTag;

class DeleteController extends Controller
{
    public function __invoke( HostelTag $hostelTag)
    {

        $hostelTag->delete();
        return  redirect()->route('hostel.tag.index');
    }
}
