<?php

namespace App\Http\Controllers\Cafe\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $cafeCatalogs = auth()->user()->cafeCatalogs;
        return view('cafe.categories.create', compact('user' , 'cafeCatalogs'));
    }
}
