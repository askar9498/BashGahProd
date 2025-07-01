<?php

namespace App\Http\Controllers\Api\PsychologicalService;

use App\Http\Controllers\Controller;
use App\Http\Resources\PsychologicalService\PsychologicalCenterResource;
use App\Models\PsychologicalCenter;
use Illuminate\Http\JsonResponse;

class PsychologicalCenterController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $psychological_centers = PsychologicalCenter::query()->orderByDesc('id')->get();

        return PsychologicalCenterResource::collection($psychological_centers)->response();
    }
}
