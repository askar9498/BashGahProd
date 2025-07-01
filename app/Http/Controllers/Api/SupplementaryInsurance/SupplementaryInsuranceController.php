<?php

namespace App\Http\Controllers\Api\SupplementaryInsurance;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupplementaryInsurance\SupplementaryInsuranceObligationResource;
use App\Http\Resources\SupplementaryInsurance\SupplementaryInsurancePaymentResource;
use App\Models\SupplementaryInsuranceObligation;
use App\Models\SupplementaryInsurancePayment;
use App\Models\SupplementaryInsuranceValidity;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SupplementaryInsuranceController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getObligations(): JsonResponse
    {
        $supplementary_insurance_obligation = SupplementaryInsuranceObligation::query()->orderByDesc('created_at')->paginate(10);

        return SupplementaryInsuranceObligationResource::collection($supplementary_insurance_obligation)->response();
    }

    /**
     * @param Request $params
     * @return JsonResponse
     */
    public function getPayments(Request $params): JsonResponse
    {
        /** @var SupplementaryInsurancePayment $supplementary_insurance_payment */
        $supplementary_insurance_payment = SupplementaryInsurancePayment::query()->whereUserId(Auth::guard('api')->id());

        if (!empty($params['type'])) {
            $supplementary_insurance_payment = $supplementary_insurance_payment->whereType($params['type']);
        }

        return SupplementaryInsurancePaymentResource::collection($supplementary_insurance_payment->orderByDesc('created_at')->paginate(10))->response();
    }

    /**
     * @return JsonResponse
     */
    public function getValidity(): JsonResponse
    {
        $supplementary_insurance_validity = SupplementaryInsuranceValidity::query()->whereUserId(Auth::guard('api')->id())->first();

        return new JsonResponse(['supplementary_insurance_validity' => $supplementary_insurance_validity]);
    }
}
