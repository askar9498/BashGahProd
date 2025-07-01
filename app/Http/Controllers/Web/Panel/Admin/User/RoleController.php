<?php

namespace App\Http\Controllers\Web\Panel\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{

    public function index(): Factory|View|Application
    {
        return view('panels.admin.roles.index')->with(['title' => 'لیست نقش ها', 'roles' => Role::all()]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|min:3'
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $role->guard_name = 'web';
        $role->save();

        return new JsonResponse(['role' => $role]);
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return JsonResponse
     */
    public function update(Request $request, Role $role): JsonResponse
    {
        $request->validate([
            'name' => 'nullable|string|min:3'
        ]);

        $role->name = $request->input('name');
        $role->save();

        return new JsonResponse(['role' => $role]);
    }

    /**
     * @param Role $role
     * @return Response
     */
    public function destroy(Role $role): Response
    {
        if ($role->can_delete)
            $role->delete();
        return response()->noContent();
    }
}
