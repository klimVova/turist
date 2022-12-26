<?php

namespace App\Http\Controllers\Medical\Time;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('medical.time.create', compact('user'));
    }
}
