<?php

namespace App\Http\Controllers\Consulting\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Consulting\Action\UpdateActionRequest;
use App\Models\ConsultingAction;
use Illuminate\Support\Facades\Auth;

class UpdateActionController extends Controller
{
    public function __invoke(UpdateActionRequest $request, ConsultingAction $consultingAction)
    {
        $data = $request->validated();
        $consultingAction->update($data);
        $user = Auth::id();
        return to_route('consulting.card.index',['id' => $consultingAction['cat_id']],$status = 302, compact('user'));
    }
}
