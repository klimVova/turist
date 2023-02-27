<?php

namespace App\Http\Controllers\Spa\Action;

use App\Http\Controllers\Controller;
use App\Models\SpaAction;

class EditController extends Controller
{
    public function __invoke(SpaAction $spaAction)
    {
        return view('spa.action.edit' , compact('spaAction'));
    }
}
