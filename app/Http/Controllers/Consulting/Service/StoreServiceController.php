<?php

namespace App\Http\Controllers\Consulting\Service;
use App\Http\Requests\Consulting\Service\StoreServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ConsultingService;

class StoreServiceController extends Controller
{
    public function __invoke(StoreServiceRequest $request)
    {
        $data = $request->validated();

        $user = Auth::id();

        ConsultingService::firstOrCreate($data);
        return to_route('consulting.card.index',['id' => $data['cat_id']],$status = 302, compact('user'));
    }
}
