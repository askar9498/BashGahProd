<?php

namespace App\Http\Controllers\Web\Panel\Admin\Appearance;

use App\Enums\MenuPositions;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MenuController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('panels.admin.appearance.menus.index')->with([
            'title' => 'فهرست ها', 'menus' => Menu::paginate(10)
        ]);
    }

    /**
     * @param Menu $menu
     * @return Factory|View|Application
     */
    public function show(Menu $menu): Factory|View|Application
    {
        return view('panels.admin.appearance.menus.show')->with([
            'title' => 'فهرست ها', 'menu' => $menu
        ]);
    }

    /**
     * @param Request $request
     * @param Menu $menu
     * @return JsonResponse
     */
    public function update(Request $request, Menu $menu): JsonResponse
    {
        $request->validate([
            'name' => 'nullable|string',
            'position' => ['nullable', MenuPositions::validation()],
            'config' => 'nullable'
        ]);
        $menu->name = $request->input('name') ?? $menu->name;
        $menu->position = $request->input('position') ?? $menu->position;
        $menu->config = $request->input('config') ?? $menu->config;
        $menu->save();

        return new JsonResponse([
            'message' => 'success'
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'position' => ['required', MenuPositions::validation()]
        ]);

        $menu = new Menu();
        $menu->name = $request->input('name');
        $menu->position = $request->input('position');
        $menu->config = json_encode([]);
        $menu->save();

        return new JsonResponse(['menu' => $menu]);
    }

    /**
     * @param Request $request
     * @param Menu $menu
     * @return JsonResponse
     */
    public function updateName(Request $request, Menu $menu): JsonResponse
    {
        $request->validate([
            'name' => 'nullable',
            'position' => ['nullable', MenuPositions::validation()]
        ]);

        $menu->name = $request->input('name') ?? $menu->name;
        $menu->position = $request->input('position') ?? $menu->position;
        $menu->save();

        return new JsonResponse(['menu' => $menu]);
    }

    public function destroy(Menu $menu): Response
    {
        $menu->delete();

        return response()->noContent();
    }
}
