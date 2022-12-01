<?php

namespace App\Http\Controllers\Hostel\Post;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $hostelCategories = HostelCategory::all();
        $user = Auth::id();

        return view('hostel.post.create', compact('hostelCategories', 'user'));
    }
}
