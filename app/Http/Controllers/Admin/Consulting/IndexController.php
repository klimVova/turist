<?php

namespace App\Http\Controllers\Admin\Consulting;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::all();

        return view('admin.consulting.index', compact('users'));
    }
}
