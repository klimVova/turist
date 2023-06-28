<?php

namespace App\Http\Controllers\Sport\Action;

use App\Http\Controllers\Controller;
use App\Models\SportAction;

class DeleteController extends Controller
{
    public function __invoke( SportAction $sportAction)
    {
        $sportAction->delete();
        return  redirect()->route('sport.action.index');
    }
}
