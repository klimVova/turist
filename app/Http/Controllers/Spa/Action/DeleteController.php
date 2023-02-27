<?php

namespace App\Http\Controllers\Spa\Action;

use App\Http\Controllers\Controller;
use App\Models\SpaAction;
use App\Models\MedicalTime;
use App\Models\MedicalTodoList;

class DeleteController extends Controller
{
    public function __invoke( SpaAction $spaAction)
    {
        $spaAction->delete();
        return  redirect()->route('spa.action.index');
    }
}
