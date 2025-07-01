<?php

namespace App\Http\Controllers\Web\Panel\Auth;

use App\Models\SignIn;
use App\Services\Otp;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;


class AuthController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['required', 'string' , 'email' , 'exists:users,email'],
            'password' => ['required'],
//            'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('otp_action')]
        ]);


        if (!Auth::attempt($request->only(['email', 'password'])))
            throw new HttpException(401,'نام کاربری یا رمز عبور اشتباه است!');

        $sign_ins = new SignIn();
        $sign_ins->ip = $request->ip();
        $sign_ins->user_id = Auth::id();
        $sign_ins->user_agent = $request->userAgent();
        $sign_ins->save();

        return new JsonResponse(['message' => 'ورود موفق',"is_admin"=>Auth::user()->is_admin]);
    }
}
