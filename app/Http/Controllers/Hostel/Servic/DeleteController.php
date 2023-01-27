<?php

namespace App\Http\Controllers\Hostel\Servic;

use App\Http\Controllers\Controller;
use App\Models\HostelServic;

class DeleteController extends Controller
{
    public function __invoke( HostelServic $hostelServic)
    {
        $hostelServic->delete();
        return  redirect()->route('hostel.servic.index');
    }
}
