<?php

namespace App\Http\Controllers\CafeShow;

use App\Http\Controllers\Controller;
use App\Models\CafeCard;
use App\Models\HostelCard;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $cafeCards = CafeCard::paginate(9);
        return view('cafeShow.index', compact('cafeCards'));
    }
}