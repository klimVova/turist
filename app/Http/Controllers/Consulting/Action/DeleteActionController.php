<?php

namespace App\Http\Controllers\Consulting\Action;

use App\Http\Controllers\Controller;
use App\Models\ConsultingTime;
use App\Models\ConsultingAction;
use Illuminate\Support\Facades\Auth;

class DeleteActionController extends Controller
{
    public function __invoke( ConsultingAction $consultingAction)
    {
        $consultingAction->delete();
        $user = Auth::id();
        return to_route('consulting.card.index',['id' => $consultingAction['cat_id']],$status = 302, compact('user'));
    }
}
