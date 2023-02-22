<?php

namespace App\Http\Controllers\Sanatorium\Action;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumAction;

class EditController extends Controller
{
    public function __invoke(SanatoriumAction $sanatoriumAction)
    {
        return view('sanatorium.action.edit' , compact('sanatoriumAction'));
    }
}
