<?php

namespace App\Http\Controllers\Consulting\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Consulting\Service\UpdateServiceRequest;
use App\Models\ConsultingService;
use Illuminate\Support\Facades\Auth;

class UpdateServiceController extends Controller
{
    public function __invoke(UpdateServiceRequest $request, ConsultingService $consultingService)
    {
        $data = $request->validated();
        $consultingService->update($data);
        $user = Auth::id();
        return to_route('consulting.card.index',['id' => $consultingService['cat_id']],$status = 302, compact('user'));
    }
}
