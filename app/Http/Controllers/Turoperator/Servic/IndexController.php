<?php

namespace App\Http\Controllers\Turoperator\Servic;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $turoperatorServics = auth()->user()->turoperatorServics;
        return view('turoperator.servic.index', compact('user','turoperatorServics'));
    }
}
