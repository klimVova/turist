<?php

namespace App\Http\Controllers\Admin\Republic;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.republic.create');
    }
}
