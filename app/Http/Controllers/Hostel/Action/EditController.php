<?php

namespace App\Http\Controllers\Hostel\Action;

use App\Http\Controllers\Controller;
use App\Models\HostelAction;

class EditController extends Controller
{
    public function __invoke(HostelAction $hostelAction)
    {
        return view('hostel.action.edit' , compact('hostelAction'));
    }
}
