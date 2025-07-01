<?php

namespace App\Http\Controllers\Api\AdvisoryService;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvisoryService\AdvisoryContractResource;
use App\Models\AdvisoryContract;
use Auth;
use Illuminate\Http\JsonResponse;

class AdvisoryContractController extends Controller
{
    public function index(): JsonResponse
    {
        $advisory_contract = AdvisoryContract::query()->whereUserId(Auth::guard('api')->id())->orderByDesc('id')->paginate(10);

        return AdvisoryContractResource::collection($advisory_contract)->response();
    }
}
