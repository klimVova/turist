<?php

namespace App\Http\Controllers\Sport\Action;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('sport.action.create', compact('user'));
    }
}
