<?php

namespace App\Http\Controllers\Api\SupplementaryInsurance;

use App\Http\Controllers\Controller;
use App\Http\Resources\DependentResource;
use App\Models\Dependent;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class DependentController extends Controller
{
    use AuthorizesRequests;

    public function index(): JsonResponse
    {
        $dependent = Dependent::query()->whereSupervisorId(Auth::guard('api')->id())->whereIsSupplementaryInsuranced(true)->orderByDesc('updated_at')->paginate(10);

        return DependentResource::collection($dependent)->response();
    }

    /**
     * @param Dependent $dependent
     * @return JsonResponse
     */
    public function addToSupplementaryInsurance(Dependent $dependent): JsonResponse
    {
        $dependent->is_supplementary_insuranced = true;
        $dependent->save();

        return new JsonResponse(['dependent' => new DependentResource($dependent)]);
    }

    /**
     * @param Dependent $dependent
     * @return Response
     */
    public function removeFromSupplementaryInsurance(Dependent $dependent): Response
    {
        $dependent->is_supplementary_insuranced = false;
        $dependent->save();

        return response()->noContent();
    }
}
