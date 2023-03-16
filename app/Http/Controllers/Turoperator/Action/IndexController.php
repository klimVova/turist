<?php

namespace App\Http\Controllers\Turoperator\Action;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $turoperatorActions = auth()->user()->turoperatorActions;
        return view('turoperator.action.index', compact('user','turoperatorActions'));
    }
}
