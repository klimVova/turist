<?php

namespace App\Http\Controllers\API\Spa;

use App\Http\Controllers\Controller;
use App\Http\Resources\Spa\SpaCardImagesResource;
use App\Models\SpaCardImage;


class ImagesController extends Controller
{
    public function __invoke()
    {
        $spaPost = SpaCardImage::all();
        return  SpaCardImagesResource::collection($spaPost);
    }
}
