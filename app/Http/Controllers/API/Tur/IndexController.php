<?php

namespace App\Http\Controllers\API\Tur;

use App\Http\Controllers\Controller;
use App\Http\Filters\TurFilter;
use App\Http\Requests\API\Tur\IndexRequest;
use App\Http\Resources\Tur\TurResource;
use App\Models\TuroperatorCard;


class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(TurFilter::class, ['queryParams' => array_filter($data)]);
        $turs = TuroperatorCard::filter($filter)->get();
        return TurResource::collection($turs);
    }
}
