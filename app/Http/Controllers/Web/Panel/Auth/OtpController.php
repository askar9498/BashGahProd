<?php

namespace App\Http\Controllers\Web\Panel\Auth;

use App\Jobs\SendOtpJob;
use App\Models\SignIn;
use App\Models\User;
use App\Services\Otp;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;


class OtpController
{
    /**
     * @param Request $request
     * @param Otp $otp
     * @return JsonResponse
     */
    public function request(Request $request, Otp $otp): JsonResponse
    {
        $request->validate([
            'cellphone' => ['required', 'string', 'max:20'],
            'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('otp_action')]
        ]);

        $cellphone = $request->input('cellphone');
        if (!User::whereCellphone($cellphone)->first())
            throw new HttpException(401,'شماره وارد شده در سیستم ثبت نشده است!');

        $ttl = $otp->ttl($cellphone);

        if ($ttl > 0) {
            return new JsonResponse(['expires_after' => $ttl]);
        } else {
            $code = $otp->generate($cellphone);
            dispatch(new SendOtpJob($cellphone, $code));
            return new JsonResponse(['expires_after' => $otp->expiresAfter()]);
        }
    }

    /**
     * @throws ValidationException
     */
    public function submit(Request $request, Otp $otp): JsonResponse
    {
        $request->validate([
            'cellphone' => ['required', 'string', 'max:20'],
            'otp' => ['required','numeric' ],
            'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('otp_action')]
        ]);

        $cellphone = $request->input('cellphone');
        if (!$otp->check($cellphone, $request->input('otp'))) {
            throw ValidationException::withMessages([
                'error' => 'کد وارد شده اشتباه است'
            ]);
        }

        $user = User::whereCellphone($cellphone)->first();
        Auth::login($user);

        $sign_ins = new SignIn();
        $sign_ins->ip = $request->ip();
        $sign_ins->user_id = Auth::id();
        $sign_ins->user_agent = $request->userAgent();
        $sign_ins->save();

        return new JsonResponse(['message' => 'ورود موفق', 'user' => $user]);
    }
}
