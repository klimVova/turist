<?php

namespace App\Http\Controllers\Medical\Action;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('medical.action.create', compact('user'));
    }
}
