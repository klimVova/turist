<?php

namespace App\Http\Controllers\API\Baner;

use App\Http\Controllers\Controller;
use App\Http\Resources\Baner\BanerResource;
use App\Models\Baner;

class IndexController extends Controller
{
    public function __invoke()
    {
      $baners = Baner::all();
      return BanerResource::collection($baners);
    }
}
