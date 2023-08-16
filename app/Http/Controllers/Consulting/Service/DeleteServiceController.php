<?php

namespace App\Http\Controllers\Consulting\Service;

use App\Http\Controllers\Controller;
use App\Models\ConsultingTime;
use App\Models\ConsultingService;
use Illuminate\Support\Facades\Auth;

class DeleteServiceController extends Controller
{
    public function __invoke( ConsultingService $consultingService)
    {
        $consultingService->delete();
        $user = Auth::id();
        return to_route('consulting.card.index',['id' => $consultingService['cat_id']],$status = 302, compact('user'));
    }
}
