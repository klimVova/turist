<?php

namespace App\Http\Controllers\Cafe\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Action\UpdateRequest;
use App\Models\CafeAction;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CafeAction $cafeAction)
    {
        $data = $request->validated();
        $cafeAction->update($data);
        return redirect()->route('cafe.action.index');
    }
}
