<?php

namespace App\Http\Controllers\API\Spa;

use App\Http\Controllers\Controller;
use App\Http\Filters\SpaFilter;
use App\Http\Requests\API\Medical\IndexRequest;
use App\Http\Resources\Spa\SpaResource;
use App\Models\SpaCard;


class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(SpaFilter::class, ['queryParams' => array_filter($data)]);
        $spa = SpaCard::filter($filter)->get();
        return SpaResource::collection($spa);
    }
}
