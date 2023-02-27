<?php

namespace App\Http\Controllers\Cafe\Action;

use App\Http\Controllers\Controller;
use App\Models\CafeAction;

class EditController extends Controller
{
    public function __invoke(CafeAction $cafeAction)
    {
        return view('cafe.action.edit' , compact('cafeAction'));
    }
}
