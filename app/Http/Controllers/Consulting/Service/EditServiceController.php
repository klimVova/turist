<?php

namespace App\Http\Controllers\Consulting\Service;

use App\Http\Controllers\Controller;
use App\Models\ConsultingService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditServiceController extends Controller
{
    public function __invoke(ConsultingService $consultingService)
    {

        $user = Auth::id();
        $items = auth()->user()->cats;
        $lists = DB::table('consulting_cat_users')->where('cat_id', '=', $consultingService)->get();
        return view('consulting.service.edit', compact('consultingService','user' , 'items','lists'));
    }
}
