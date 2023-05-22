<?php

namespace App\Http\Controllers\User\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Main\UpdateRequest;
use App\Models\preOrder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $preOrders=  DB::table('pre_orders')->where('user_id', '=', $user['id'])->get();
        $totals = DB::table('pre_orders')->pluck('total_price') ;
        $payments =  DB::table('payments')->where('user_id', '=', $user['id'])->get();
        $user->update($data);
        return view('user.main.index' , compact('user' ,'preOrders', 'totals', 'payments'));
    }
}
