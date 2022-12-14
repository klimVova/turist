<?php

namespace App\Http\Controllers\Admin\Republic;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Republic;

class ShowController extends Controller
{
    public function __invoke(Republic $republic)
    {
        return view('admin.republic.show', compact('republic'));
    }
}
