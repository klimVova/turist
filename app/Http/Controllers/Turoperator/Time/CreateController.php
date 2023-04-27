<?php

namespace App\Http\Controllers\Turoperator\Time;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('turoperator.time.create', compact('user'));
    }
}
