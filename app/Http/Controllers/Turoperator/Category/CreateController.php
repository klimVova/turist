<?php

namespace App\Http\Controllers\Turoperator\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('turoperator.categories.create', compact('user'));
    }
}
