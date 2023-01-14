<?php

namespace App\Http\Controllers\Medical\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('medical.tag.create' , compact('user'));
    }
}
