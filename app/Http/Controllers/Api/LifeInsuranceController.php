<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LifeInsurance\LifeInsuranceObligationResource;
use App\Http\Resources\LifeInsurance\LifeInsurancePaymentResource;
use App\Models\LifeInsuranceObligation;
use App\Models\LifeInsurancePayment;
use App\Models\LifeInsuranceValidity;
use Auth;
use Illuminate\Http\JsonResponse;

class LifeInsuranceController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getObligations(): JsonResponse
    {
        $life_insurance_obligation = LifeInsuranceObligation::query()->orderByDesc('id')->paginate(10);

        return LifeInsuranceObligationResource::collection($life_insurance_obligation)->response();
    }

    public function getPayments(): JsonResponse
    {
        $life_insurance_payment = LifeInsurancePayment::query()->with('user')->whereUserId(Auth::guard('api')->id())->orderByDesc('created_at')->paginate(10);

        return LifeInsurancePaymentResource::collection($life_insurance_payment)->response();
    }

    public function getValidity(): JsonResponse
    {
        $life_insurance_validity = LifeInsuranceValidity::query()->whereUserId(Auth::guard('api')->id())->first();

        return new JsonResponse(['life_insurance_validity' => $life_insurance_validity]);
    }
}
