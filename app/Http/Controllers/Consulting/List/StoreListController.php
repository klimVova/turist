<?php

namespace App\Http\Controllers\Consulting\List;
use App\Http\Requests\Consulting\List\StoreListRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ConsultingList;

class StoreListController extends Controller
{
    public function __invoke(StoreListRequest $request)
    {
        $data = $request->validated();

        $user = Auth::id();

        ConsultingList::firstOrCreate($data);
        return to_route('consulting.card.index',['id' => $data['cat_id']],$status = 302, compact('user'));
    }
}
