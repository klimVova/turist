<?php

namespace App\Http\Controllers\Turoperator\Servic;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorServic;

class DeleteController extends Controller
{
    public function __invoke( TuroperatorServic $turoperatorServic)
    {
        $turoperatorServic->delete();
        return  redirect()->route('turoperator.servic.index');
    }
}
