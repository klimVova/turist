<?php

namespace App\Http\Controllers\Sport\Action;

use App\Http\Controllers\Controller;
use App\Models\SportAction;

class EditController extends Controller
{
    public function __invoke(SportAction $sportAction)
    {
        return view('sport.action.edit' , compact('sportAction'));
    }
}
