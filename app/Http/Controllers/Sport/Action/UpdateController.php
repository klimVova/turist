<?php

namespace App\Http\Controllers\Sport\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\Action\UpdateRequest;
use App\Models\SportAction;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SportAction $sportAction)
    {
        $data = $request->validated();
        $sportAction->update($data);
        return redirect()->route('sport.action.index');
    }
}
