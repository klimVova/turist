<?php

namespace App\Http\Controllers\Sanatorium\Action;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumAction;
use App\Models\MedicalTime;
use App\Models\MedicalTodoList;

class DeleteController extends Controller
{
    public function __invoke( SanatoriumAction $sanatoriumAction)
    {
        $sanatoriumAction->delete();
        return  redirect()->route('sanatorium.action.index');
    }
}
