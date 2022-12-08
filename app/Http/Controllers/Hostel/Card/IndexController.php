<?php

namespace App\Http\Controllers\Hostel\Card;

use App\Http\Controllers\Controller;
use App\Models\HostelCard;
use App\Models\HostelCategory;
use App\Models\HostelPost;

class IndexController extends Controller
{
    public function __invoke()
    {

        $hostelCards = auth()->user()->hostelCards;
        return view('hostel.card.index', compact('hostelCards'));
    }
}
