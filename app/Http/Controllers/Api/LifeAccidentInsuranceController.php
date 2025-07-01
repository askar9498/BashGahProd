<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LifeAccidentInsurance\LifeAccidentInsuranceObligationResource;
use App\Http\Resources\LifeAccidentInsurance\LifeAccidentInsurancePaymentResource;
use App\Models\LifeAccidentInsuranceObligation;
use App\Models\LifeAccidentInsurancePayment;
use App\Models\LifeAccidentInsuranceValidity;
use Auth;
use Illuminate\Http\JsonResponse;

class LifeAccidentInsuranceController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getObligations(): JsonResponse
    {
        $life_accident_insurance_obligations = LifeAccidentInsuranceObligation::query()->orderByDesc('id')->paginate(10);

        return LifeAccidentInsuranceObligationResource::collection($life_accident_insurance_obligations)->response();
    }

    /**
     * @return JsonResponse
     */
    public function getPayments(): JsonResponse
    {
        $life_accident_insurance_payments = LifeAccidentInsurancePayment::query()->with('user')->whereUserId(Auth::guard('api')->id())->orderByDesc('created_at')->paginate(10);

        return LifeAccidentInsurancePaymentResource::collection($life_accident_insurance_payments)->response();
    }

    /**
     * @return JsonResponse
     */
    public function getValidity(): JsonResponse
    {
        $life_accident_insurance_validity = LifeAccidentInsuranceValidity::query()->whereUserId(Auth::guard('api')->id())->first();

        return new JsonResponse(['life_accident_insurance_validity' => $life_accident_insurance_validity]);
    }
}
