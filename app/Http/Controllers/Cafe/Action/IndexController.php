<?php

namespace App\Http\Controllers\Cafe\Action;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $cafeActions = auth()->user()->cafeActions;
        return view('cafe.action.index', compact('user','cafeActions'));
    }
}
