<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\User;
use App\Rules\Cellphone;
use App\Rules\Password;
use App\Services\File\FileManager;
use Auth;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProfileController extends Controller
{

    public function index(): JsonResponse
    {
        /** @var User $user */
        $user = Auth::guard('api')->user();

        return new JsonResponse(new ProfileResource($user->load(['photo', 'birthCertificateImage', 'nationalCardImage'])));
    }

    public function update(Request $request, FileManager $fm): JsonResponse
    {
        /** @var User $user */
        $user = Auth::guard('api')->user();

        $request->validate([
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'employee_number' => ['nullable', 'string', Rule::unique('users')->ignore($user->id)],
            'national_id' => ['nullable', 'string', Rule::unique('users')->ignore($user->id)],
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'birth_date' => 'nullable|date',
            'last_post' => 'nullable|string',
            'insurance_number' => 'nullable|string',
            'birth_certificate_number' => 'nullable|string',
            'cellphone' => ['nullable', new Cellphone(), Rule::unique('users')->ignore($user->id)],
            'email' => ['nullable', 'email', Rule::unique('users')->ignore($user->id)],
            'profile_photo_id' => 'nullable|exists:files,id',
            'birth_certificate_image_id' => 'nullable|exists:files,id',
            'national_card_image_id' => 'nullable|exists:files,id'
        ]);

        $user->first_name = $request->input('first_name') ?? $user->first_name;
        $user->last_name = $request->input('last_name') ?? $user->last_name;
        $user->last_post = $request->input('last_post') ?? $user->last_post;
        $user->employee_number = $request->input('employee_number') ?? $user->employee_number;
        $user->national_id = $request->input('national_id') ?? $user->national_id;
        $user->start_date = $request->input('start_date') ?? $user->start_date;
        $user->end_date = $request->input('end_date') ?? $user->end_date;
        $user->birth_date = $request->input('birth_date') ?? $user->birth_date;
        $user->insurance_number = $request->input('insurance_number') ?? $user->insurance_number;
        $user->birth_certificate_number = $request->input('birth_certificate_number') ?? $user->birth_certificate_number;
        $user->cellphone = $request->input('cellphone') ?? $user->cellphone;
        $user->email = $request->input('email') ?? $user->email;

        if (!empty($request->input('profile_photo_id'))) {
            $user->photo_id = $request->input('profile_photo_id');
            //$fm->attachFile('users', $user->id, json_decode('[{"id":"' . $user->photo_id . '"}]'));
        }

        if (!empty($request->input('birth_certificate_image_id'))) {
            $user->birth_certificate_image_id = $request->input('birth_certificate_image_id');
            //$fm->attachFile('users', $user->id, json_decode('[{"id":"' . $user->birth_certificate_image_id . '"}]'));
        }

        if (!empty($request->input('national_card_image_id'))) {
            $user->national_card_image_id = $request->input('national_card_image_id');
            //$fm->attachFile('users', $user->id, json_decode('[{"id":"' . $user->national_card_image_id . '"}]'));
        }

        $user->save();

        return new JsonResponse(['user' => new ProfileResource($user->load(['photo', 'birthCertificateImage', 'nationalCardImage']))]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function changePassword(Request $request): JsonResponse
    {
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', new Password()]
        ]);

        /** @var User $user */
        $user = Auth::guard('api')->user();

        $current_password = $request->input('current_password');

        if (!Hash::check($current_password, $user->password))
            throw new HttpException(401, 'کلمه عبور فعلی اشتیاه است!');

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return new JsonResponse(['message' => 'success']);
    }

}
