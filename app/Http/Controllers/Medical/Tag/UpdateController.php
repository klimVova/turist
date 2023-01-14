<?php

namespace App\Http\Controllers\Medical\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\Tag\UpdateRequest;
use App\Models\MedicalTag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, MedicalTag $medicalTag)
    {
        $data = $request->validated();
        $medicalTag->update($data);
        return view('medical.tag.show' , compact('medicalTag'));
    }
}
