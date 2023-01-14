<?php

namespace App\Http\Controllers\Medical\Tag;

use App\Http\Controllers\Controller;
use App\Models\MedicalTag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $medicalTags =  auth()->user()->medicalTags ;
        return view('medical.tag.index', compact('medicalTags'));
    }
}
