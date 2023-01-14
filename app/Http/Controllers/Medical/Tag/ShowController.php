<?php

namespace App\Http\Controllers\Medical\Tag;

use App\Http\Controllers\Controller;
use App\Models\MedicalCategory;
use App\Models\MedicalTag;

class ShowController extends Controller
{
    public function __invoke(MedicalTag $medicalTag)
    {
        return view('medical.tag.show', compact('medicalTag'));
    }
}
