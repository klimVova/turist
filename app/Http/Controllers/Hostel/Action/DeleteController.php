<?php

namespace App\Http\Controllers\Hostel\Action;

use App\Http\Controllers\Controller;
use App\Models\HostelAction;
use App\Models\MedicalTime;
use App\Models\MedicalTodoList;

class DeleteController extends Controller
{
    public function __invoke( HostelAction $hostelAction)
    {
        $hostelAction->delete();
        return  redirect()->route('hostel.action.index');
    }
}
