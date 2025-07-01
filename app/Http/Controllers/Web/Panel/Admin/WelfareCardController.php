<?php

namespace App\Http\Controllers\Web\Panel\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WelfareCardPayment;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Morilog\Jalali\Jalalian;

class WelfareCardController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('panels.admin.welfare-cards.index', [
            'title' => 'لیست پرداخت های کارت رفاهی',
            'welfare_cards' => WelfareCardPayment::query()->orderByDesc('created_at')->paginate(10),
            'users' => User::query()->get()
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'amount' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'description' => 'required|string|max:255'
        ]);

        $welfareCardPayment = new WelfareCardPayment();
        $welfareCardPayment->user_id = $request->input('user_id');
        $welfareCardPayment->amount = $request->input('amount');
        $welfareCardPayment->date = Jalalian::fromFormat('Y/m/d', $request->input('date'))->toCarbon();
        $welfareCardPayment->description = $request->input('description');
        $welfareCardPayment->save();

        return new JsonResponse(['message' => 'پرداختی با موفقیت اضافه شد!']);
    }

    /**
     * @param Request $request
     * @param WelfareCardPayment $welfareCardPayment
     * @return JsonResponse
     */
    public function update(Request $request, WelfareCardPayment $welfareCardPayment): JsonResponse
    {
        $request->validate([
            'amount' => 'nullable|numeric',
            'user_id' => 'nullable|exists:users,id',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255'
        ]);

        $welfareCardPayment->user_id = $request->input('user_id') ?? $welfareCardPayment->user_id;
        $welfareCardPayment->amount = $request->input('amount') ?? $welfareCardPayment->amount;
        $welfareCardPayment->date = Jalalian::fromFormat('Y/m/d', $request->input('date'))->toCarbon() ?? $welfareCardPayment->date;
        $welfareCardPayment->description = $request->input('description') ?? $welfareCardPayment->description;
        $welfareCardPayment->save();

        return new JsonResponse(['message' => 'پرداختی با موفقیت اضافه شد!']);
    }

    /**
     * @param WelfareCardPayment $welfareCardPayment
     * @return Response
     */
    public function destroy(WelfareCardPayment $welfareCardPayment): Response
    {
        $welfareCardPayment->delete();

        return response()->noContent();
    }
}
