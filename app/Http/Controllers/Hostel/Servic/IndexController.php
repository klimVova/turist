<?php

namespace App\Http\Controllers\Hostel\Servic;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $hostelServics = auth()->user()->hostelServics;
        return view('hostel.servic.index', compact('user','hostelServics'));
    }
}
