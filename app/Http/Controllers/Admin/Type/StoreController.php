<?php

namespace App\Http\Controllers\Admin\Type;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Type\StoreRequest;
use App\Models\Type;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Type::firstOrCreate($data);

        return redirect()->route('admin.type.index');
    }
}
