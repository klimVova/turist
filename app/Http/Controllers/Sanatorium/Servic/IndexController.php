<?php

namespace App\Http\Controllers\Sanatorium\Servic;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $sanatoriumServics = auth()->user()->sanatoriumServics;
        return view('sanatorium.servic.index', compact('user','sanatoriumServics'));
    }
}
