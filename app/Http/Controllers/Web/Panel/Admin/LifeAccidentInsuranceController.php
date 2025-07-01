<?php

namespace App\Http\Controllers\Web\Panel\Admin;

use App\Http\Controllers\Controller;
use App\Models\LifeAccidentInsuranceObligation;
use App\Models\LifeAccidentInsurancePayment;
use App\Models\LifeAccidentInsuranceValidity;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Morilog\Jalali\Jalalian;

class LifeAccidentInsuranceController extends Controller
{
    public function getObligations(): Factory|View|Application
    {
        $life_accident_insurance_obligations = LifeAccidentInsuranceObligation::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.life-accident-insurances.obligations')->with(['title' => 'لیست تعهدات بیمه عمر و حوادث', 'life_accident_insurance_obligations' => $life_accident_insurance_obligations]);
    }


    public function getPayments(): Factory|View|Application
    {
        $life_accident_insurance_payments = LifeAccidentInsurancePayment::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.life-accident-insurances.payments')->with(['title' => 'لیست پرداخت های بیمه عمر و حوادث',
            'life_accident_insurance_payments' => $life_accident_insurance_payments,
            'users' => User::query()->get()
        ]);
    }


    public function getValidity(): Factory|View|Application
    {
        $life_accident_insurance_validities = LifeAccidentInsuranceValidity::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.life-accident-insurances.validities')->with(['title' => 'لیست تاریخ های اعتبار بیمه عمر و حوادث',
            'life_accident_insurance_validities' => $life_accident_insurance_validities,
            'users' => User::query()->get()
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function storeValidity(Request $request): JsonResponse
    {
        $request->validate([
            'end' => 'nullable',
            'start' => 'nullable',
            'user_id' => 'required|exists:users,id'
        ]);

        $lifeAccidentInsuranceValidity = new LifeAccidentInsuranceValidity();
        $lifeAccidentInsuranceValidity->start = !empty($request->input('start')) ? Jalalian::fromFormat('Y/m/d', $request->input('start'))->toCarbon() : null;
        $lifeAccidentInsuranceValidity->end = !empty($request->input('end')) ? Jalalian::fromFormat('Y/m/d', $request->input('end'))->toCarbon() : null;
        $lifeAccidentInsuranceValidity->user_id = $request->input('user_id');
        $lifeAccidentInsuranceValidity->save();

        return new JsonResponse(['message' => 'زمان اعتبار با موفقیت ویرایش شد!']);
    }

    /**
     * @param Request $request
     * @param $validity_id
     * @return JsonResponse
     */
    public function updateValidity(Request $request, $validity_id): JsonResponse
    {
        $request->validate([
            'end' => 'nullable',
            'start' => 'nullable',
        ]);
        /** @var LifeAccidentInsuranceValidity $lifeAccidentInsuranceValidity */
        $lifeAccidentInsuranceValidity = LifeAccidentInsuranceValidity::query()->whereId($validity_id)->firstOrFail();

        $lifeAccidentInsuranceValidity->start = Jalalian::fromFormat('Y/m/d', $request->input('start'))->toCarbon() ?? $lifeAccidentInsuranceValidity->start;
        $lifeAccidentInsuranceValidity->end = Jalalian::fromFormat('Y/m/d', $request->input('end'))->toCarbon() ?? $lifeAccidentInsuranceValidity->end;
        $lifeAccidentInsuranceValidity->save();

        return new JsonResponse(['message' => 'زمان اعتبار با موفقیت ویرایش شد!']);
    }

    /**
     * @param $validity_id
     * @return Response
     */
    public function destroyValidity($validity_id): Response
    {
        /** @var LifeAccidentInsuranceValidity $lifeAccidentInsuranceValidity */
        $lifeAccidentInsuranceValidity = LifeAccidentInsuranceValidity::query()->whereId($validity_id)->firstOrFail();

        $lifeAccidentInsuranceValidity->delete();

        return response()->noContent();
    }
}
