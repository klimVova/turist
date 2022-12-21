<?php

namespace App\Http\Controllers\HostelShow;

use App\Http\Controllers\Controller;
use App\Models\HostelCard;
use App\Models\HostelPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $hostelCards = HostelCard::paginate(9);

        return view('hostelShow.index', compact('hostelCards'));
    }
}