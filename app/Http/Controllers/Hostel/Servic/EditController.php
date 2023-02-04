<?php

namespace App\Http\Controllers\Hostel\Servic;

use App\Http\Controllers\Controller;
use App\Models\HostelServic;

class EditController extends Controller
{
    public function __invoke(HostelServic $hostelServic)
    {
        return view('hostel.servic.edit' , compact('hostelServic'));
    }
}
