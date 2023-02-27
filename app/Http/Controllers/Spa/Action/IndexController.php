<?php

namespace App\Http\Controllers\Spa\Action;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $spaActions = auth()->user()->spaActions;
        return view('spa.action.index', compact('user','spaActions'));
    }
}
