<?php

namespace App\Http\Controllers\Cafe\Action;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('cafe.action.create', compact('user'));
    }
}
