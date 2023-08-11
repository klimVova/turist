<?php

namespace App\Http\Controllers\Consulting\Main;

use App\Http\Controllers\Controller;
use App\Models\ConsultingCat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {

        $user = Auth::id();
        $items = auth()->user()->cats;

        return view('consulting.main.index', compact('items'));
    }
}
