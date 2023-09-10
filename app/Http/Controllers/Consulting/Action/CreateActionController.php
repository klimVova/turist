<?php

namespace App\Http\Controllers\Consulting\Action;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateActionController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();

        return view('consulting.action.create', compact('user'));
    }
}
