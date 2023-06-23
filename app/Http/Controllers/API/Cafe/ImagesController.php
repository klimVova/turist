<?php

namespace App\Http\Controllers\API\Cafe;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cafe\CafeCardImagesResource;
use App\Models\CafeCardImage;


class ImagesController extends Controller
{
    public function __invoke()
    {
        $cafePost = CafeCardImage::all();
        return  CafeCardImagesResource::collection($cafePost);
    }
}
