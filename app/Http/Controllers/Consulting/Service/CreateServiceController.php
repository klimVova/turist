<?php

namespace App\Http\Controllers\Consulting\Service;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateServiceController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();

        return view('consulting.service.create', compact('user'));
    }
}
