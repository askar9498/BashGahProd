<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendOtpJob;
use App\Models\User;
use App\Rules\Cellphone;
use App\Services\Otp;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ResetPasswordController extends Controller
{
    public function request(Request $request, Otp $otp): JsonResponse
    {
        $request->validate([
            'cellphone' => 'required'
        ]);

        $user = User::query()->whereCellphone($request->input('cellphone'))->orWhere('employee_number', $request->input('cellphone'))->first();

        if ($user) {
            $ttl = $otp->ttl($user->cellphone);

            if ($ttl > 0) {
                return new JsonResponse(['expires_after' => $ttl, 'cellphone' => $user->cellphone]);
            } else {
                $password = $otp->generate($user->cellphone);
                dispatch(new SendOtpJob($user->cellphone, $password));

                try {
                    $response = Http::post(config('context.bpms.base_url').'/SendSMS', [
                        "key" => config('context.bpms.key'),
                        "phoneNo" => $user->cellphone,
                        "bodyText" => "باشگاه بازنشستگان آریاساسول کد تایید شما : ".$password,
                        "from" => ""
                    ]);
                } catch (\Exception $e) {
                    // do nothings
                }

                return new JsonResponse(['expires_after' => $otp->expiresAfter(), 'cellphone' => $user->cellphone]);
            }
        } else {
            throw new HttpException(404, 'کاربر یافت نشد!');
        }
    }

    /**
     * @param Request $request
     * @param Otp $otp
     * @return JsonResponse
     * @throws ValidationException
     */
    public function submit(Request $request, Otp $otp): JsonResponse
    {
        $request->validate([
            'cellphone' => ['required', new Cellphone()],
            'otp' => 'required',
            'password' => 'required|confirmed',
        ]);

        $cellphone = $request->input('cellphone');

        if (!$otp->check($cellphone, $request->input('otp'))) {
            throw ValidationException::withMessages([
                'error' => trans('validation.exists', [
                    'attribute' => trans('validation.attributes.otp'),
                ]),
            ]);
        }

        /** @var User $user */
        $user = User::query()->whereCellphone($cellphone)->first();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return new JsonResponse(['message' => 'پسورد با موفقیت تغییر کرد!']);
    }
}
