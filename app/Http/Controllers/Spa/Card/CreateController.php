<?php

namespace App\Http\Controllers\Spa\Card;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('spa.card.create', compact('user'));
    }
}
