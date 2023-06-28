<?php

namespace App\Http\Controllers\Sport\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('sport.tag.create' , compact('user'));
    }
}
