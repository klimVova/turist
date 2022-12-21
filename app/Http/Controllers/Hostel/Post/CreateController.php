<?php

namespace App\Http\Controllers\Hostel\Post;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;
use App\Models\HostelTag;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $hostelCategories = auth()->user()->hostelCategories;
        $hostelTags =auth()->user()->hostelTags;
        $user = Auth::id();

        return view('hostel.post.create', compact('hostelCategories', 'user', 'hostelTags'));
    }
}
