<?php

namespace App\Http\Controllers\Sport\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\Action\StoreRequest;
use App\Models\SportAction;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        SportAction::firstOrCreate($data);
        return redirect()->route('sport.action.index');
    }
}
