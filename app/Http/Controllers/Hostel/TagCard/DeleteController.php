<?php

namespace App\Http\Controllers\Hostel\TagCard;

use App\Http\Controllers\Controller;
use App\Models\HostelCardTag;
use App\Models\HostelTagCard;

class DeleteController extends Controller
{
    public function __invoke( HostelCardTag $hostelCardTag)
    {

        $hostelCardTag->delete();
        return  redirect()->route('hostel.tagCard.index');
    }
}
