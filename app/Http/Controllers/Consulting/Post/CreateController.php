<?php

namespace App\Http\Controllers\Consulting\Post;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;
use App\Models\HostelTag;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke($id)
    {
        $user = Auth::id();
        $items = auth()->user()->cats;
        return view('consulting.post.create', compact('items','user','id'));
    }
}
