<?php

namespace App\Http\Controllers\Api\PsychologicalService;

use App\Http\Controllers\Controller;
use App\Http\Resources\PsychologicalService\PsychologicalUseResource;
use App\Models\PsychologicalUse;
use Auth;
use Illuminate\Http\JsonResponse;

class PsychologicalUseController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $psychological_uses = PsychologicalUse::query()->whereUserId(Auth::guard('api')->id())->orderByDesc('id')->paginate(10);

        return PsychologicalUseResource::collection($psychological_uses)->response();
    }
}
