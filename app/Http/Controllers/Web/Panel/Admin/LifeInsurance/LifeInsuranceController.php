<?php

namespace App\Http\Controllers\Web\Panel\Admin\LifeInsurance;

use App\Http\Controllers\Controller;
use App\Models\LifeInsuranceObligation;
use App\Models\LifeInsurancePayment;
use App\Models\LifeInsuranceValidity;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Morilog\Jalali\Jalalian;

class LifeInsuranceController extends Controller
{

    public function getObligations(): Factory|View|Application
    {
        $life_insurance_obligations = LifeInsuranceObligation::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.life-insurances.obligations')->with(['title' => 'لیست تعهدات بیمه عمر و سرمایه گذاری', 'life_insurance_obligations' => $life_insurance_obligations]);
    }

    public function storeObligations(Request $request): JsonResponse
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required',
            'insurance_company' => 'required',
            'insurance_year' => 'required',
            'insurance_premium' => 'required|numeric'
        ]);

        $life_insurance_obligation = new LifeInsuranceObligation();
        $life_insurance_obligation->amount = $request->input('amount');
        $life_insurance_obligation->description = $request->input('description');
        $life_insurance_obligation->insurance_company = $request->input('insurance_company');
        $life_insurance_obligation->insurance_year = $request->input('insurance_year');
        $life_insurance_obligation->insurance_premium = $request->input('insurance_premium');
        $life_insurance_obligation->save();

        return new JsonResponse(['message' => 'با موفقیت ایجاد شد!']);
    }

    public function updateObligations(Request $request, LifeInsuranceObligation $lifeInsuranceObligation): JsonResponse
    {
        $request->validate([
            'amount' => 'nullable|numeric',
            'description' => 'nullable',
            'insurance_company' => 'nullable',
            'insurance_no' => 'nullable',
            'insurance_year' => 'nullable',
            'insurance_premium' => 'nullable|numeric'
        ]);

        $lifeInsuranceObligation->amount = $request->input('amount') ?? $lifeInsuranceObligation->amount;
        $lifeInsuranceObligation->description = $request->input('description') ?? $lifeInsuranceObligation->description;
        $lifeInsuranceObligation->insurance_company = $request->input('insurance_company') ?? $lifeInsuranceObligation->insurance_company;
        $lifeInsuranceObligation->insurance_no = $request->input('insurance_no') ?? $lifeInsuranceObligation->insurance_no;
        $lifeInsuranceObligation->insurance_year = $request->input('insurance_year') ?? $lifeInsuranceObligation->insurance_year;
        $lifeInsuranceObligation->insurance_premium = $request->input('insurance_premium') ?? $lifeInsuranceObligation->insurance_premium;
        $lifeInsuranceObligation->save();

        return new JsonResponse(['message' => 'با موفقیت ویرایش شد!']);
    }

    public function destroyObligations(LifeInsuranceObligation $lifeInsuranceObligation): Response
    {
        $lifeInsuranceObligation->delete();

        return response()->noContent();
    }

    public function getPayments(): Factory|View|Application
    {
        $life_insurance_payments = LifeInsurancePayment::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.life-insurances.payments')->with([
            'title' => 'لیست پرداخت های بیمه عمر و سرمایه گذاری',
            'life_insurance_payments' => $life_insurance_payments,
            'users' => User::query()->get()
        ]);
    }

    public function storePayments(Request $request): JsonResponse
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required',
            'date' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        $life_insurance_payment = new LifeInsurancePayment();
        $life_insurance_payment->user_id = $request->input('user_id');
        $life_insurance_payment->amount = $request->input('amount');
        $life_insurance_payment->date = Jalalian::fromFormat('Y/m/d', $request->input('date'))->toCarbon();
        $life_insurance_payment->description = $request->input('description');
        $life_insurance_payment->save();

        return new JsonResponse(['message' => 'با موفقیت اضافه شد!']);
    }

    public function updatePayments(Request $request, LifeInsurancePayment $lifeInsurancePayment): JsonResponse
    {
        $request->validate([
            'amount' => 'nullable|numeric',
            'description' => 'nullable',
            'date' => 'nullable'
        ]);

        $lifeInsurancePayment->amount = $request->input('amount') ?? $lifeInsurancePayment->amount;
        $lifeInsurancePayment->date = Jalalian::fromFormat('Y/m/d', $request->input('date'))->toCarbon() ?? $lifeInsurancePayment->date;
        $lifeInsurancePayment->description = $request->input('description') ?? $lifeInsurancePayment->description;
        $lifeInsurancePayment->save();

        return new JsonResponse(['message' => 'با موفقیت ویرایش شد!']);

    }

    public function destroyPayments(LifeInsurancePayment $lifeInsurancePayment): Response
    {
        $lifeInsurancePayment->delete();

        return response()->noContent();
    }

    public function getValidity(): Factory|View|Application
    {
        $life_insurance_validities = LifeInsuranceValidity::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.life-insurances.validities')->with(['title' => 'لیست تاریخ های اعتبار بیمه عمر و سرمایه گذاری',
            'life_insurance_validities' => $life_insurance_validities,
            'users' => User::query()->get()]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function storeValidity(Request $request): JsonResponse
    {
        $request->validate([
            'end' => 'required',
            'start' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        $lifeInsuranceValidity = new LifeInsuranceValidity();
        $lifeInsuranceValidity->start = Jalalian::fromFormat('Y/m/d', $request->input('start'))->toCarbon();
        $lifeInsuranceValidity->end = Jalalian::fromFormat('Y/m/d', $request->input('end'))->toCarbon();
        $lifeInsuranceValidity->user_id = $request->input('user_id');
        $lifeInsuranceValidity->save();

        return new JsonResponse(['message' => 'زمان اعتبار با موفقیت ویرایش شد!']);
    }

    /**
     * @param Request $request
     * @param LifeInsuranceValidity $lifeInsuranceValidity
     * @return JsonResponse
     */
    public function updateValidity(Request $request, LifeInsuranceValidity $lifeInsuranceValidity): JsonResponse
    {
        $request->validate([
            'end' => 'nullable',
            'start' => 'nullable',
        ]);

        $lifeInsuranceValidity->start = Jalalian::fromFormat('Y/m/d', $request->input('start'))->toCarbon() ?? $lifeInsuranceValidity->start;
        $lifeInsuranceValidity->end = Jalalian::fromFormat('Y/m/d', $request->input('end'))->toCarbon() ?? $lifeInsuranceValidity->end;
        $lifeInsuranceValidity->save();

        return new JsonResponse(['message' => 'زمان اعتبار با موفقیت ویرایش شد!']);
    }

    /**
     * @param LifeInsuranceValidity $lifeInsuranceValidity
     * @return Response
     */
    public function destroyValidity(LifeInsuranceValidity $lifeInsuranceValidity): Response
    {
        $lifeInsuranceValidity->delete();

        return response()->noContent();
    }
}
