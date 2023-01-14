<?php

namespace App\Http\Controllers\Spa\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('spa.tag.create' , compact('user'));
    }
}
