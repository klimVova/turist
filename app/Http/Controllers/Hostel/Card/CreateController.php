<?php

namespace App\Http\Controllers\Hostel\Card;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('hostel.card.create', compact('user'));
    }
}
