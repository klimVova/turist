<?php

namespace App\Http\Controllers\API\PreOrder;

use App\Http\Controllers\Controller;
use App\Http\Filters\SanatoriumFilter;
use App\Http\Requests\API\PreOrder\StoreRequest;
use App\Http\Requests\API\Sanatorium\IndexRequest;
use App\Http\Resources\PreOrder\PreOrderResource;
use App\Http\Resources\Sanatorium\TurResource;
use App\Models\preOrder;
use App\Models\SanatoriumCard;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $preOrder = preOrder::create([
            'products' => json_encode($data['products']),
            'user_id' => $data['user_id'],
            'total_price' => $data['total_price'],
            'date' => $data['date'],
            'name_product' => $data['name_product'],
            'image_product' => $data['image_product'],
            'role' => $data['role'],
        ]);

        return new PreOrderResource($preOrder);
    }
}
