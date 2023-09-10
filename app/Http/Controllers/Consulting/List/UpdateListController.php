<?php

namespace App\Http\Controllers\Consulting\List;

use App\Http\Controllers\Controller;
use App\Http\Requests\Consulting\List\UpdateListRequest;
use App\Models\ConsultingList;
use Illuminate\Support\Facades\Auth;

class UpdateListController extends Controller
{
    public function __invoke(UpdateListRequest $request, ConsultingList $consultingList)
    {
        $data = $request->validated();
        $consultingList->update($data);
        $user = Auth::id();
        return to_route('consulting.card.index',['id' => $consultingList['cat_id']],$status = 302, compact('user'));
    }
}
