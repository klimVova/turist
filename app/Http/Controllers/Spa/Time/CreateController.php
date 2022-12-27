<?php

namespace App\Http\Controllers\Spa\Time;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('spa.time.create', compact('user'));
    }
}
