<?php

namespace App\Http\Controllers\Sanatorium\Servic;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumServic;

class DeleteController extends Controller
{
    public function __invoke( SanatoriumServic $sanatoriumServic)
    {
        $sanatoriumServic->delete();
        return  redirect()->route('sanatorium.servic.index');
    }
}
