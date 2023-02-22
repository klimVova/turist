<?php

namespace App\Http\Controllers\Sanatorium\Servic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\Servic\UpdateRequest;
use App\Models\SanatoriumServic;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SanatoriumServic $sanatoriumServic)
    {
        $data = $request->validated();
        $sanatoriumServic->update($data);
        return redirect()->route('sanatorium.servic.index');
    }
}
