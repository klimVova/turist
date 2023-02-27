<?php

namespace App\Http\Controllers\Medical\Action;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $medicalActions = auth()->user()->medicalActions;
        return view('medical.action.index', compact('user','medicalActions'));
    }
}
