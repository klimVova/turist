<?php

namespace App\Http\Controllers\API\Medical;

use App\Http\Controllers\Controller;
use App\Http\Resources\Medical\MedicalCardImagesResource;
use App\Models\MedicalCardImage;


class ImagesController extends Controller
{
    public function __invoke()
    {
        $medicalPost = MedicalCardImage::all();
        return  MedicalCardImagesResource::collection($medicalPost);
    }
}
