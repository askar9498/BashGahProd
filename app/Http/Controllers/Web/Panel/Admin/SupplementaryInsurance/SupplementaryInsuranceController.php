<?php

namespace App\Http\Controllers\Web\Panel\Admin\SupplementaryInsurance;

use App\Enums\SupplementaryInsurancePaymentType;
use App\Http\Controllers\Controller;
use App\Models\Illness;
use App\Models\IllnessType;
use App\Models\SupplementaryInsuranceObligation;
use App\Models\SupplementaryInsurancePayment;
use App\Models\SupplementaryInsuranceValidity;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class SupplementaryInsuranceController extends Controller
{
    public function getObligations(): Factory|View|Application
    {
        $supplementary_insurance_obligations = SupplementaryInsuranceObligation::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.supplementary-insurances.obligations')->with(['title' => 'لیست تعهدات بیمه تکمیلی', 'supplementary_insurance_obligations' => $supplementary_insurance_obligations]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function storeObligation(Request $request): JsonResponse
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required',
            'franchise' => 'required|numeric|min:0|max:1000'
        ]);

        $supplementary_insurance_obligation = new SupplementaryInsuranceObligation();
        $supplementary_insurance_obligation->amount = $request->input('amount');
        $supplementary_insurance_obligation->description = $request->input('description');
        $supplementary_insurance_obligation->franchise = $request->input('franchise');
        $supplementary_insurance_obligation->save();

        return new JsonResponse(['message' => 'تعهد با موفقیت اضافه شد!']);
    }

    /**
     * @param Request $request
     * @param $obligation_id
     * @return JsonResponse
     */
    public function updateObligation(Request $request, $obligation_id): JsonResponse
    {
        $request->validate([
            'amount' => 'nullable|numeric',
            'description' => 'nullable',
            'franchise' => 'nullable|numeric|min:0|max:1000'
        ]);

        /** @var SupplementaryInsuranceObligation $supplementary_insurance_obligation */
        $supplementary_insurance_obligation = SupplementaryInsuranceObligation::query()->whereId($obligation_id)->firstOrFail();

        $supplementary_insurance_obligation->amount = $request->input('amount') ?? $supplementary_insurance_obligation->amount;
        $supplementary_insurance_obligation->description = $request->input('description') ?? $supplementary_insurance_obligation->description;
        $supplementary_insurance_obligation->franchise = $request->input('franchise') ?? $supplementary_insurance_obligation->franchise;
        $supplementary_insurance_obligation->save();

        return new JsonResponse(['message' => 'تعهد با موفقیت ویرایش شد!']);
    }

    /**
     * @param $obligation_id
     * @return JsonResponse
     */
    public function destroyObligation($obligation_id): JsonResponse
    {
        /** @var SupplementaryInsuranceObligation $supplementary_insurance_obligation */
        $supplementary_insurance_obligation = SupplementaryInsuranceObligation::query()->whereId($obligation_id)->firstOrFail();

        $supplementary_insurance_obligation->delete();

        return new JsonResponse(['message' => 'تعهد با موفقیت خذف شد!']);
    }

    /**
     * @param Request $params
     * @return Factory|View|Application
     */
    public function getPayments(Request $params): Factory|View|Application
    {
        /** @var SupplementaryInsurancePayment $supplementary_insurance_payment */
        $supplementary_insurance_payments = SupplementaryInsurancePayment::query();

        if (!empty($params['type'])) {
            $supplementary_insurance_payments = $supplementary_insurance_payment->whereType($params['type']);
        }

        return view('panels.admin.supplementary-insurances.payments')
            ->with(['title' => 'لیست پرداخت های بیمه تکمیلی',
                'supplementary_insurance_payments' => $supplementary_insurance_payments->orderByDesc('id')->paginate(10),
                'users' => User::all(),
                'illness_types' => IllnessType::all(),
                'illnesses' => Illness::all()
            ]);
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function storePayment(Request $request): JsonResponse
    {
        $request->validate([
            'type' => ['required', SupplementaryInsurancePaymentType::validation()],
            'user_id' => 'required|exists:users,id',
            'dependent_id' => 'required|exists:dependents,id',
            'amount' => 'required',
            'medical_center' => 'required',
            'illness_date' => 'required',
            'remittance_date' => 'required',
            'illness_id' => 'required|exists:illnesses,id',
            'illness_type_id' => 'required|exists:illness_types,id'
        ]);

        $supplementary_insurance_payment = new SupplementaryInsurancePayment();
        $supplementary_insurance_payment->type = $request->input('type');
        $supplementary_insurance_payment->user_id = $request->input('user_id');
        $supplementary_insurance_payment->dependent_id = $request->input('dependent_id');
        $supplementary_insurance_payment->amount = $request->input('amount');
        $supplementary_insurance_payment->medical_center = $request->input('medical_center');
        $supplementary_insurance_payment->illness_date = Jalalian::fromFormat('Y/m/d', $request->input('illness_date'))->toCarbon();
        $supplementary_insurance_payment->remittance_date = Jalalian::fromFormat('Y/m/d', $request->input('remittance_date'))->toCarbon();
        $supplementary_insurance_payment->illness_id = $request->input('illness_id');
        $supplementary_insurance_payment->illness_type_id = $request->input('illness_type_id');

        $supplementary_insurance_payment->save();

        return new JsonResponse(['message' => 'پرداختی با موفقیت اضافه شد!']);
    }

    public function updatePayment(Request $request, $payment_id): JsonResponse
    {
        $request->validate([
            'type' => ['nullable', SupplementaryInsurancePaymentType::validation()],
            'user_id' => 'nullable|exists:users,id',
            'dependent_id' => 'nullable|exists:dependents,id',
            'amount' => 'nullable',
            'medical_center' => 'nullable',
            'illness_date' => 'nullable',
            'remittance_date' => 'nullable',
            'illness_id' => 'nullable|exists:illnesses,id',
            'illness_type_id' => 'nullable|exists:illness_types,id'
        ]);

        /** @var SupplementaryInsurancePayment $supplementary_insurance_payment */
        $supplementary_insurance_payment = SupplementaryInsurancePayment::query()->whereId($payment_id)->firstOrFail();

        $supplementary_insurance_payment->type = $request->input('type') ?? $supplementary_insurance_payment->type;
        $supplementary_insurance_payment->user_id = $request->input('user_id') ?? $supplementary_insurance_payment->user_id;
        $supplementary_insurance_payment->dependent_id = $request->input('dependent_id') ?? $supplementary_insurance_payment->dependent_id;
        $supplementary_insurance_payment->amount = $request->input('amount') ?? $supplementary_insurance_payment->amount;
        $supplementary_insurance_payment->medical_center = $request->input('medical_center') ?? $supplementary_insurance_payment->medical_center;
        $supplementary_insurance_payment->illness_date = Jalalian::fromFormat('Y/m/d', $request->input('illness_date'))->toCarbon() ?? $supplementary_insurance_payment->illness_date;
        $supplementary_insurance_payment->remittance_date = Jalalian::fromFormat('Y/m/d', $request->input('remittance_date'))->toCarbon() ?? $supplementary_insurance_payment->remittance_date;
        $supplementary_insurance_payment->illness_id = $request->input('illness_id') ?? $supplementary_insurance_payment->illness_id;
        $supplementary_insurance_payment->illness_type_id = $request->input('illness_type_id') ?? $supplementary_insurance_payment->illness_type_id;

        $supplementary_insurance_payment->save();

        return new JsonResponse(['message' => 'پرداختی با موفقیت اضافه شد!']);
    }

    /**
     * @param $payment_id
     * @return JsonResponse
     */
    public function destroyPayment($payment_id): JsonResponse
    {
        /** @var SupplementaryInsurancePayment $supplementary_insurance_payment */
        $supplementary_insurance_payment = SupplementaryInsurancePayment::query()->whereId($payment_id)->firstOrFail();

        $supplementary_insurance_payment->delete();

        return new JsonResponse(['message' => 'با موفقیت حذف شد!']);
    }

    public function getValidity(): Factory|View|Application
    {
        $supplementary_insurance_validities = SupplementaryInsuranceValidity::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.supplementary-insurances.validities')->with(['title' => 'لیست تاریخ های اعتبار بیمه تکمیلی', 'supplementary_insurance_validities' => $supplementary_insurance_validities, 'users' => User::all()]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function storeValidity(Request $request): JsonResponse
    {
        $request->validate([
            'start' => 'required',
            'end' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        $supplementary_insurance_validity = new SupplementaryInsuranceValidity();
        $supplementary_insurance_validity->start = Jalalian::fromFormat('Y/m/d', $request->input('start'))->toCarbon();
        $supplementary_insurance_validity->end = Jalalian::fromFormat('Y/m/d', $request->input('end'))->toCarbon();
        $supplementary_insurance_validity->user_id = $request->input('user_id');
        $supplementary_insurance_validity->save();

        return new JsonResponse(['message' => 'اعتبار با موفقیت ایجاد شد!']);
    }

    /**
     * @param Request $request
     * @param $validity_id
     * @return JsonResponse
     */
    public function updateValidity(Request $request, $validity_id): JsonResponse
    {
        $request->validate([
            'start' => 'nullable',
            'end' => 'nullable',
        ]);

        /** @var SupplementaryInsuranceValidity $supplementary_insurance_validity */
        $supplementary_insurance_validity = SupplementaryInsuranceValidity::query()->whereId($validity_id)->firstOrFail();

        $supplementary_insurance_validity->start = Jalalian::fromFormat('Y/m/d', $request->input('start'))->toCarbon() ?? $supplementary_insurance_validity->start;
        $supplementary_insurance_validity->end = Jalalian::fromFormat('Y/m/d', $request->input('end'))->toCarbon() ?? $supplementary_insurance_validity->end;
        $supplementary_insurance_validity->save();

        return new JsonResponse(['message' => 'اعتبار با موفقیت ویرایش شد!']);
    }

    /**
     * @param $validity_id
     * @return JsonResponse
     */
    public function destroyValidity($validity_id): JsonResponse
    {
        /** @var SupplementaryInsuranceValidity $supplementary_insurance_validity */
        $supplementary_insurance_validity = SupplementaryInsuranceValidity::query()->whereId($validity_id)->firstOrFail();

        $supplementary_insurance_validity->delete();

        return new JsonResponse(['message' => 'اعتبار با موفقیت حذف شد!']);
    }
}
