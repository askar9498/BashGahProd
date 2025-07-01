<?php

namespace App\Http\Controllers\Web\Panel\User;

use App\Jobs\SendSmsJob;
use App\Models\SignIn;
use App\Models\User;
use App\Rules\Cellphone;
use App\Services\File\FileManager;
use App\Services\Otp;
use Auth;
use Hash;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProfileController
{
    /**
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('panels.profile')->with(['title' => 'پروفایل کاربری', 'user' => Auth::user()->load('photo')]);
    }

    /**
     * @param Request $request
     * @param Otp $otp
     * @return JsonResponse
     */
    public function update(Request $request, Otp $otp): JsonResponse
    {
        $request->validate([
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'cellphone' => ['nullable', new Cellphone()],
            'email' => ['nullable', 'email']
        ]);

        /** @var User $user */
        $user = Auth::user();
        $cellphone = $request->input('cellphone');

        if (!empty($cellphone) && $cellphone != $user->cellphone) {
            $ttl = $otp->ttl($cellphone);

            if ($ttl > 0) {
                return new JsonResponse(['expires_after' => $ttl]);
            } else {
                $code = $otp->generate($cellphone);
                dispatch(new SendSmsJob($cellphone, $code));
                return new JsonResponse(['expires_after' => $otp->expiresAfter()]);
            }
        }

        $user->first_name = $request->input('name') ?? $user->first_name;
        $user->last_name = $request->input('name') ?? $user->last_name;
        $user->email = $request->input('email') ?? $user->email;

        $user->save();

        return new JsonResponse(['message' => 'success']);
    }

    /**
     * @param Request $request
     * @param Otp $otp
     * @return JsonResponse
     * @throws ValidationException
     */
    public function confirmUpdate(Request $request, Otp $otp): JsonResponse
    {
        $request->validate([
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'cellphone' => ['required', 'string', new Cellphone()],
            'otp' => ['required', 'numeric'],
            'email' => ['nullable', 'email']
        ]);

        $cellphone = $request->input('cellphone');
        if (!$otp->check($cellphone, $request->input('otp'))) {
            throw ValidationException::withMessages([
                'error' => 'کد وارد شده اشتباه است'
            ]);
        }

        /** @var User $user */
        $user = Auth::user();
        $user->first_name = $request->input('first_name') ?? $user->first_name;
        $user->last_name = $request->input('last_name') ?? $user->last_name;
        $user->email = $request->input('email') ?? $user->email;
        $user->cellphone = $cellphone;

        $user->save();

        return new JsonResponse(['message' => 'success']);
    }

    /**
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function signIns(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('panels.sign_ins')->with(['title' => 'ورود ها', 'sign_ins' => SignIn::whereUserId(Auth::id())->orderByDesc('id')->paginate(10)]);
    }

    /**
     * @param Request $request
     * @param FileManager $fm
     * @return JsonResponse
     */
    public function changePhoto(Request $request, FileManager $fm): JsonResponse
    {
        $request->validate([
            'file' => ['required', 'mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048']
        ]);

        $file = $request->file('file');
        $files = $fm->upload([$file], 'users');
        $fm->attachFile('users', Auth()->id(), $files);

        Auth::user()->photo_id = $files[0]['id'];
        Auth::user()->save();

        return new JsonResponse(['messages' => 'files uploaded!']);
    }


    /**
     * @param Request $request
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function changePassword(Request $request): JsonResponse
    {
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', 'min:7']//, new Password()
        ]);

        $user = Auth::user();
        $password = $request->input('password');
        if (!Hash::check($request->input('current_password'), $user->password))
            throw new HttpException(401,'کلمه عبور فعلی اشتیاه است!');

        $user->password = Hash::make($password);
        $user->save();

        $user->refresh();

        Auth::logoutOtherDevices($password);

        return new JsonResponse(['message' => 'success']);
    }
}
