<?php

namespace App\Http\Controllers\Consulting\Post;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\HostelCategory;
use App\Models\HostelTag;
use App\Models\Republic;
use App\Models\Type;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{
    public function __invoke($id)
    {
        $user = Auth::id();
        $user_email = DB::table('users')->where('id', '=', $user)->pluck('email');
        $items = auth()->user()->cats;
        return view('consulting.post.create', compact('items','user','id','user_email'));
    }
}
