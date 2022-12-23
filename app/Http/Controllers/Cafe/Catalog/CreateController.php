<?php

namespace App\Http\Controllers\Cafe\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('cafe.catalog.create', compact('user'));
    }
}
