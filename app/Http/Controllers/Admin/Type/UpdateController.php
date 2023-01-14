<?php

namespace App\Http\Controllers\Admin\Type;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Type\UpdateRequest;
use App\Models\Type;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Type $type)
    {
        $data = $request->validated();
        $type->update($data);
        return view('admin.type.show' , compact('type'));
    }
}
