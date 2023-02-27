<?php

namespace App\Http\Controllers\Cafe\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Action\StoreRequest;
use App\Models\CafeAction;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        CafeAction::firstOrCreate($data);
        return redirect()->route('cafe.action.index');
    }
}
