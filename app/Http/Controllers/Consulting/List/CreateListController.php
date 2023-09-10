<?php

namespace App\Http\Controllers\Consulting\List;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateListController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();

        return view('consulting.list.create', compact('user'));
    }
}
