<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index(): JsonResponse
    {
        return new JsonResponse(['provinces' => Province::get()]);
    }

    public function cities(Province $province): JsonResponse
    {
        return new JsonResponse(['cities' => City::query()->whereProvinceId($province->id)->orderByDesc('id')->get()]);
    }
}
