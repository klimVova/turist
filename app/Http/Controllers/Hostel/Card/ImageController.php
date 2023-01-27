<?php

namespace App\Http\Controllers\Hostel\Card;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;
use App\Models\HostelCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function __invoke(HostelCard $hostelCard){
        $images =  DB::table('hostel_card_images')->where('hostel_card_id', '=', $hostelCard->id)->get();
        $hostelCategories = HostelCategory::all();
        $user = Auth::id();
        return view('hostel.card.image', compact('hostelCard','images', 'user', 'hostelCategories'));
    }
}
