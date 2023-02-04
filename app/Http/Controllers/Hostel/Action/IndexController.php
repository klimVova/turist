<?php

namespace App\Http\Controllers\Hostel\Action;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $hostelActions = auth()->user()->hostelActions;
        return view('hostel.action.index', compact('user','hostelActions'));
    }
}
