<?php

namespace App\Http\Controllers\Sport\Servic;

use App\Http\Controllers\Controller;
use App\Models\SportServic;

class DeleteController extends Controller
{
    public function __invoke( SportServic $sportServic)
    {
        $sportServic->delete();
        return  redirect()->route('sport.servic.index');
    }
}
