<?php

namespace App\Http\Controllers\Sport\Servic;

use App\Http\Controllers\Controller;
use App\Models\SportServic;

class EditController extends Controller
{
    public function __invoke(SportServic $sportServic)
    {
        return view('sport.servic.edit' , compact('sportServic'));
    }
}
