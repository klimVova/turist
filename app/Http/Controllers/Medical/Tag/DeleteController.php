<?php

namespace App\Http\Controllers\Medical\Tag;

use App\Http\Controllers\Controller;
use App\Models\MedicalTag;

class DeleteController extends Controller
{
    public function __invoke( MedicalTag $medicalTag)
    {

        $medicalTag->delete();
        return  redirect()->route('medical.tag.index');
    }
}
