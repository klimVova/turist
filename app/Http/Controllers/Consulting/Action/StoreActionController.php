<?php

namespace App\Http\Controllers\Consulting\Action;
use App\Http\Requests\Consulting\Action\StoreActionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ConsultingAction;

class StoreActionController extends Controller
{
    public function __invoke(StoreActionRequest $request)
    {

        $data = $request->validated();
        $user = Auth::id();
        ConsultingAction::firstOrCreate($data);
        return to_route('consulting.card.index',['id' => $data['cat_id']],$status = 302, compact('user'));
    }
}
