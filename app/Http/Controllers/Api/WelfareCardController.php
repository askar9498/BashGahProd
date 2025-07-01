<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WelfareCardPaymentResource;
use App\Models\WelfareCardPayment;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WelfareCardController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getPayments(): JsonResponse
    {
        $welfare_card = WelfareCardPayment::query()->whereUserId(Auth::guard('api')->id())->orderByDesc('id')->paginate(10);

        return WelfareCardPaymentResource::collection($welfare_card)->response();
    }
}
