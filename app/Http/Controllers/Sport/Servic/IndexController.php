<?php

namespace App\Http\Controllers\Sport\Servic;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $sportServics = auth()->user()->sportServics;
        return view('sport.servic.index', compact('user','sportServics'));
    }
}
