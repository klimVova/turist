<?php

namespace App\Http\Controllers\Sanatorium\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\Action\StoreRequest;
use App\Models\SanatoriumAction;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        SanatoriumAction::firstOrCreate($data);
        return redirect()->route('sanatorium.action.index');
    }
}
