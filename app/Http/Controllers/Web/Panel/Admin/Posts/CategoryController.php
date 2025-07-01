<?php

namespace App\Http\Controllers\Web\Panel\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class CategoryController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('panels.admin.news.categories')->with([
                'title' => 'دسته بندی اخبار و اطلاعیه',
                'categories' => Category::all()]
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|min:3'
        ]);

        $category = new Category();
        $category->title = $request->input('title');
        $category->save();

        return new JsonResponse(['category' => $category]);
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return JsonResponse
     */
    public function update(Request $request, Category $category): JsonResponse
    {
        $request->validate([
            'title' => 'nullable|string|min:3'
        ]);

        $category->title = $request->input('title');
        $category->save();

        return new JsonResponse(['message' => 'success']);
    }

    /**
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category): Response
    {
        $category->delete();

        return response()->noContent();
    }
}
