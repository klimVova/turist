<?php

namespace App\Http\Controllers\Admin\Type;

use App\Http\Controllers\Controller;
use App\Models\Type;

class IndexController extends Controller
{
    public function __invoke()
    {
        $types = Type::all();
        return view('admin.type.index', compact('types'));
    }
}
