<?php

namespace App\Http\Controllers\Consulting\List;

use App\Http\Controllers\Controller;
use App\Models\ConsultingTime;
use App\Models\ConsultingList;
use Illuminate\Support\Facades\Auth;

class DeleteListController extends Controller
{
    public function __invoke( ConsultingList $consultingList)
    {
        $consultingList->delete();
        $user = Auth::id();
        return to_route('consulting.card.index',['id' => $consultingList['cat_id']],$status = 302, compact('user'));
    }
}
