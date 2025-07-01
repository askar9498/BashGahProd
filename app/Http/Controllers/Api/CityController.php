<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $params): JsonResponse
    {
        $cities = City::query();
        if (!empty($params['name'])) {
            $cities = $cities->where('name', 'like', '%' . $params['name'] . '%');
        }

        return new JsonResponse(['cities' => $cities->get()]);
    }
}
