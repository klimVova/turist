<?php

namespace App\Http\Controllers\Hostel\Card;

use App\Http\Controllers\Controller;
use App\Models\HostelCard;
use App\Models\HostelCategory;

class ShowController extends Controller
{
    public function __invoke(HostelCard $hostelCard)
    {
        return view('hostel.card.show', compact('hostelCard'));
    }
}
