<?php

namespace App\Http\Controllers\Turoperator\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('turoperator.tag.create' , compact('user'));
    }
}
