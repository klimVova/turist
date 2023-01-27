<?php

namespace App\Http\Controllers\Hostel\Card;

use App\Http\Controllers\Controller;
use App\Models\HostelCard;
use App\Models\HostelCategory;
use App\Models\HostelPost;

class EditController extends Controller
{
    public function __invoke(HostelCard $hostelCard)
    {
        $hostelCardTags =auth()->user()->hostelCardTag;
        return view('hostel.card.edit' , compact('hostelCard','hostelCardTags'));
    }
}
