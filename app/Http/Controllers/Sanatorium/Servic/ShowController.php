<?php

namespace App\Http\Controllers\Sanatorium\Servic;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumServic;

class ShowController extends Controller
{
    public function __invoke(SanatoriumServic $sanatoriumServic)
    {
        return view('sanatorium.servic.show', compact('sanatoriumServic'));
    }
}
