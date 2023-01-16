<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('client.main.index');
    }
}
