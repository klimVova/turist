<?php

namespace App\Http\Controllers\Cafe\Action;

use App\Http\Controllers\Controller;
use App\Models\CafeAction;

class DeleteController extends Controller
{
    public function __invoke( CafeAction $cafeAction)
    {
        $cafeAction->delete();
        return  redirect()->route('cafe.action.index');
    }
}
