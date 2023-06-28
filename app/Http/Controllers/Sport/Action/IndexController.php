<?php

namespace App\Http\Controllers\Sport\Action;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $sportActions = auth()->user()->sportActions;
        return view('sport.action.index', compact('user','sportActions'));
    }
}
