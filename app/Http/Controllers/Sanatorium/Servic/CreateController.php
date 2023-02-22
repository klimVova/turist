<?php

namespace App\Http\Controllers\Sanatorium\Servic;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('sanatorium.servic.create', compact('user'));
    }
}
