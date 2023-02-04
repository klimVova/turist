<?php

namespace App\Http\Controllers\Hostel\Action;

use App\Http\Controllers\Controller;
use App\Models\HostelAction;

class ShowController extends Controller
{
    public function __invoke(HostelAction $hostelAction)
    {
        return view('hostel.todolist.show', compact('hostelAction'));
    }
}
