<?php

namespace App\Http\Controllers\Hostel\Card;

use App\Http\Controllers\Controller;
use App\Models\HostelCard;
use App\Models\HostelCategory;
use App\Models\HostelPost;

class DeleteController extends Controller
{
    public function __invoke( HostelCard $hostelCard)
    {
        $hostelCard->delete();
        return  redirect()->route('hostel.card.index');
    }
}
