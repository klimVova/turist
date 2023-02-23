<?php

namespace App\Http\Controllers\API\Sanatorium;

use App\Http\Controllers\Controller;
use App\Http\Resources\Medical\MedicalResource;
use App\Models\City;
use App\Models\District;
use App\Models\MedicalCard;
use App\Models\Republic;
use App\Models\Type;


class FilterListController extends Controller
{
    public function __invoke()
    {
      $types = Type::all();
      $districts = District::all();
      $republics = Republic::all();
      $cities = City::all();

      $result = [
          'types' => $types,
          'districts' => $districts,
          'republics' => $republics,
          'cities' => $cities,
      ];
      return response()->json($result);
    }
}
