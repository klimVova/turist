<?php

namespace App\Http\Controllers\Medical\Tag;

use App\Http\Controllers\Controller;
use App\Models\MedicalCategory;
use App\Models\MedicalTag;

class EditController extends Controller
{
    public function __invoke(MedicalTag $medicalTag)
    {
        return view('medical.tag.edit' , compact('medicalTag'));
    }
}
