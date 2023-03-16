<?php

namespace App\Http\Controllers\Turoperator\Action;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorAction;
use App\Models\MedicalTime;
use App\Models\MedicalTodoList;

class DeleteController extends Controller
{
    public function __invoke( TuroperatorAction $turoperatorAction)
    {
        $turoperatorAction->delete();
        return  redirect()->route('turoperator.action.index');
    }
}
