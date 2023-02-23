<?php

namespace App\Http\Controllers\API\Sanatorium;

use App\Http\Controllers\Controller;
use App\Http\Filters\SanatoriumFilter;
use App\Http\Requests\API\Sanatorium\IndexRequest;
use App\Http\Resources\Sanatorium\SanatoriumResource;
use App\Models\SanatoriumCard;


class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(SanatoriumFilter::class, ['queryParams' => array_filter($data)]);
        $sanatoriums = SanatoriumCard::filter($filter)->get();
        return SanatoriumResource::collection($sanatoriums);
    }
}
