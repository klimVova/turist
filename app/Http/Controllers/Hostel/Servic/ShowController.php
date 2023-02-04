<?php

namespace App\Http\Controllers\Hostel\Servic;

use App\Http\Controllers\Controller;
use App\Models\HostelServic;

class ShowController extends Controller
{
    public function __invoke(HostelServic $hostelServic)
    {
        return view('hostel.servic.show', compact('hostelServic'));
    }
}
