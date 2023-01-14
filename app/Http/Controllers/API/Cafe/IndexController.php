<?php

namespace App\Http\Controllers\API\Cafe;

use App\Http\Controllers\Controller;
use App\Http\Filters\CafeFilter;
use App\Http\Requests\API\Medical\IndexRequest;
use App\Http\Resources\Cafe\CafeResource;
use App\Models\CafeCard;


class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(CafeFilter::class, ['queryParams' => array_filter($data)]);
        $cafes = CafeCard::filter($filter)->get();
        return CafeResource::collection($cafes);
    }
}
