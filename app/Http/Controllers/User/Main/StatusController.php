<?php

namespace App\Http\Controllers\User\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Main\UpdateRequest;
use App\Models\preOrder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $preOrders=  DB::table('pre_orders')->where('user_id', '=', $user['id'])->delete();

        return view('user.main.success' );
    }
}
