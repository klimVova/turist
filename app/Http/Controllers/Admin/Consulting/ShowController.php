<?php

namespace App\Http\Controllers\Admin\Consulting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        return view('admin.consulting.show', compact('user'));
    }
}
