<?php

namespace App\Http\Controllers\Admin\Baner;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $images =  DB::table('baners')->get();
        $user = Auth::id();
        return view('admin.baner.image', compact('images', 'user'));
    }
}
