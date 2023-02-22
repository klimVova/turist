<?php

namespace App\Http\Controllers\Sanatorium\Action;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $sanatoriumActions = auth()->user()->sanatoriumActions;
        return view('sanatorium.action.index', compact('user','sanatoriumActions'));
    }
}
