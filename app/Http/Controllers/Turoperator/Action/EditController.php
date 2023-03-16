<?php

namespace App\Http\Controllers\Turoperator\Action;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorAction;

class EditController extends Controller
{
    public function __invoke(TuroperatorAction $turoperatorAction)
    {
        return view('turoperator.action.edit' , compact('turoperatorAction'));
    }
}
