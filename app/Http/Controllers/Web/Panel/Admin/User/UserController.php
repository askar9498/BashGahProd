<?php

namespace App\Http\Controllers\Web\Panel\Admin\User;

use App\Enums\UserStatuses;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Rules\Cellphone;
use App\Services\FilterService;
use Hash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Morilog\Jalali\Jalalian;


class UserController extends Controller
{
    protected FilterService $filterService;

    public function __construct(FilterService $filterService)
    {
        $this->filterService = $filterService;
    }

    public function index(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $request->validate([
            'filters' => 'nullable|array',
            'filters.first_name' => ['nullable'],
            'filters.email' => ['nullable'],
            'filters.cellphone' => ['nullable'],
            'filters.is_admin' => ['nullable']
        ]);

        $filters = $request->input('filters', []);
        $sorts = $request->input('sorts', []);
        $users = $this->filterService->apply(User::query()->with(['roles']), $filters, $sorts)->orderByDesc('id')->paginate(10);

        return view('panels.admin.users')->with(['title' => 'مدیریت کاربران',
            'users' => $users,
            'roles' => Role::all()]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $request->validate([
            'cellphone' => ['required', 'unique:users,cellphone', new Cellphone()],
            'email' => 'required|email|unique:users,email',
            'role_id' => 'nullable|exists:roles,id',
            'is_admin' => 'required|boolean',
            'password' => 'required|string|min:4|confirmed',
            "first_name" => 'required',
            "last_name" => 'required',
            "employee_number" => 'required|unique:users,employee_number',
            "national_id" => 'nullable',
            "start_date" => 'nullable',
            "end_date" => 'nullable',
            "birth_date" => 'nullable',
            "last_post" => 'nullable',
            "club_membership_date" => 'nullable',
            "club_validity_date" => 'nullable',
            "insurance_number" => 'nullable',
            "birth_certificate_number" => 'nullable',
        ]);

        if ($request->input('is_admin'))
            $request->validate([
                'role_id' => 'required'
            ]);

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->cellphone = $request->input('cellphone');
        $user->email = $request->input('email');
        $user->is_admin = $request->input('is_admin');
        $user->employee_number = $request->input('employee_number');
        $user->national_id = $request->input('national_id');
        $user->start_date = Jalalian::fromFormat('Y/m/d', $request->input('start_date'))->toCarbon();
        $user->end_date = Jalalian::fromFormat('Y/m/d', $request->input('end_date'))->toCarbon();
        $user->birth_date = Jalalian::fromFormat('Y/m/d', $request->input('birth_date'))->toCarbon();
        $user->last_post = $request->input('last_post');
        $user->club_validity_date = Jalalian::fromFormat('Y/m/d', $request->input('club_validity_date'))->toCarbon();
        $user->club_membership_date = Jalalian::fromFormat('Y/m/d', $request->input('club_membership_date'))->toCarbon();
        $user->insurance_number = $request->input('insurance_number');
        $user->birth_certificate_number = $request->input('birth_certificate_number');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        if ($user->is_admin) {
            $role = Role::whereId($request->input('role_id'))->first();
            $user->syncRoles([$role->name]);
        }

        return new JsonResponse(['message' => 'user created successfully', 'user' => $user]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(Request $request, User $user): JsonResponse
    {
        $request->validate([
            'cellphone' => ['nullable', Rule::unique('users')->ignore($user->id)],
            'email' => ['nullable', Rule::unique('users')->ignore($user->id)],
            'role_id' => 'nullable|exists:roles,id',
            'is_admin' => 'nullable|boolean',
            'password' => 'nullable|string|min:4|confirmed',
            "first_name" => 'nullable',
            "last_name" => 'nullable',
            "employee_number" => ['nullable', Rule::unique('users')->ignore($user->id)],
            "national_id" => 'nullable',
            "start_date" => 'nullable',
            "end_date" => 'nullable',
            "birth_date" => 'nullable',
            "last_post" => 'nullable',
            "club_membership_date" => 'nullable',
            "club_validity_date" => 'nullable',
            "insurance_number" => 'nullable',
            "birth_certificate_number" => 'nullable',
        ]);

        if ($request->input('is_admin'))
            $request->validate([
                'role_id' => 'required'
            ]);

        $user->first_name = $request->input('first_name') ?? $user->first_name;
        $user->last_name = $request->input('last_name') ?? $user->last_name;
        $user->email = $request->input('email') ?? $user->email;
        $user->cellphone = $request->input('cellphone') ?? $user->cellphone;
        $user->is_admin = $request->input('is_admin') ?? $user->is_admin;
        $user->employee_number = $request->input('employee_number') ?? $user->employee_number;
        $user->national_id = $request->input('national_id') ?? $user->national_id;
        $user->start_date = Jalalian::fromFormat('Y/m/d', $request->input('start_date'))->toCarbon() ?? $user->start_date;
        $user->end_date = Jalalian::fromFormat('Y/m/d', $request->input('end_date'))->toCarbon() ?? $user->end_date;
        $user->birth_date = Jalalian::fromFormat('Y/m/d', $request->input('birth_date'))->toCarbon() ?? $user->birth_date;
        $user->last_post = $request->input('last_post') ?? $user->last_post;
        $user->club_validity_date = Jalalian::fromFormat('Y/m/d', $request->input('club_validity_date'))->toCarbon() ?? $user->club_validity_date;
        $user->club_membership_date = Jalalian::fromFormat('Y/m/d', $request->input('club_membership_date'))->toCarbon() ?? $user->club_membership_date;
        $user->insurance_number = $request->input('insurance_number') ?? $user->insurance_number;
        $user->birth_certificate_number = $request->input('birth_certificate_number') ?? $user->birth_certificate_number;

        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password')) ?? $user->password;
        }

        $user->save();

        if ($user->is_admin) {
            $role = Role::whereId($request->input('role_id'))->first();
            $user->syncRoles([$role->name]);
        } else {
            $user->syncRoles([]);
        }

        return new JsonResponse(['message' => 'message updated successfully!', 'user' => $user]);
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function toggleStatus(User $user): JsonResponse
    {
        $user->status = ($user->status == UserStatuses::ACTIVATED ? UserStatuses::DEACTIVATED : UserStatuses::ACTIVATED);

        $user->save();

        return new JsonResponse(['message' => 'user status updated!']);
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return new JsonResponse(['message' => 'user deleted!']);
    }

}
