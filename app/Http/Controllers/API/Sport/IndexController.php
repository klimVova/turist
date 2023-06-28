<?php

namespace App\Http\Controllers\API\Sport;

use App\Http\Controllers\Controller;
use App\Http\Filters\SportFilter;
use App\Http\Requests\API\Sport\IndexRequest;
use App\Http\Resources\Sport\SportResource;
use App\Models\SportCard;


class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(SportFilter::class, ['queryParams' => array_filter($data)]);
        $sports = SportCard::filter($filter)->get();
        return SportResource::collection($sports);
    }
}
