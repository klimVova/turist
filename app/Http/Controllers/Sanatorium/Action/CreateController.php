<?php

namespace App\Http\Controllers\Sanatorium\Action;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('sanatorium.action.create', compact('user'));
    }
}
