<?php

namespace App\Http\Controllers\Sanatorium\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\Action\UpdateRequest;
use App\Models\SanatoriumAction;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SanatoriumAction $sanatoriumAction)
    {
        $data = $request->validated();
        $sanatoriumAction->update($data);
        return redirect()->route('sanatorium.action.index');
    }
}
