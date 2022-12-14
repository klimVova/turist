<?php

namespace App\Http\Controllers\Admin\Republic;

use App\Http\Controllers\Controller;
use App\Models\Republic;

class IndexController extends Controller
{
    public function __invoke()
    {
        $republics = Republic::all();
        return view('admin.republic.index', compact('republics'));
    }
}
