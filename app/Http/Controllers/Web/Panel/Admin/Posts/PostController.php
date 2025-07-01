<?php

namespace App\Http\Controllers\Web\Panel\Admin\Posts;

use App\Enums\PostStatuses;
use App\Enums\PostType;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Services\File\FileManager;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('panels.admin.news.index')
            ->with(['title' => 'لیست اخبار', 'news' => Post::with(['category', 'image'])->orderByDesc('created_at')->paginate(10)]);
    }

    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('panels.admin.news.create')
            ->with(['title' => 'افزودن خبر', 'categories' => Category::all()]);
    }

    /**
     * @param Request $request
     * @param FileManager $fm
     * @return JsonResponse
     */
    public function store(Request $request, FileManager $fm): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:190',
            'description' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => ['required',PostStatuses::validation()],
            'type' => ['required',PostType::validation()],
            'featured_image_id' => 'required|exists:files,id',
            'attachments' => 'nullable|array',
        ]);

        $news = new Post();
        $news->title = $request->input('title');
        $news->user_id = Auth::guard('web')->id();
        $news->category_id = $request->input('category_id');
        $news->body = $request->input('body');
        $news->description = $request->input('description');
        $news->featured_image_id = $request->input('featured_image_id');
        $news->status = $request->input('status');
        $news->type = $request->input('type');
        $news->save();

        $files_inputs = $request->input('attachments');

        if ($files_inputs) {
            $files = array_map(function ($item) {
                return ['id' => $item];
            }, $files_inputs);
            $fm->attachFile('news', $news->id, $files);
        }

        return new JsonResponse(['message' => 'یا موفقیت ثبت شد', 'news' => $news]);
    }

    public function show(Post $news): Factory|View|Application
    {
        return view('panels.admin.news.show')
            ->with(['title' => 'لیست اخبار', 'categories' => Category::all(), 'news' => $news]);
    }

    public function update(Request $request, Post $news, FileManager $fm): JsonResponse
    {
        $request->validate([
            'title' => 'nullable|string|max:190',
            'description' => 'nullable|string',
            'body' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'status' => ['nullable',PostStatuses::validation()],
            'type' => ['nullable',PostType::validation()],
            'featured_image_id' => 'nullable|exists:files,id',
            'gallery_list' => 'nullable|array',
        ]);

        $news->title = $request->input('title') ?? $news->title;
        $news->category_id = $request->input('category_id') ?? $news->category_id;
        $news->body = $request->input('body') ?? $news->body;
        $news->description = $request->input('description') ?? $news->description;
        $news->featured_image_id = $request->input('featured_image_id') ?? $news->featured_image_id;
        $news->status = $request->input('status') ?? $news->status;
        $news->type = $request->input('type') ?? $news->type;
        $news->save();

        $files_inputs = $request->input('attachments');

        if ($files_inputs) {
            $files = array_map(function ($item) {
                return ['id' => $item];
            }, $files_inputs);
            $fm->attachFile('news', $news->id, $files);
        }

        return new JsonResponse(['message' => 'یا موفقیت ثبت شد', 'news' => $news]);
    }

    public function destroy(Post $news): Response
    {
        $news->delete();
        return response()->noContent();
    }

    public function toggleStatus(Post $news): JsonResponse
    {
        $news->status = ($news->status == PostStatuses::PUBLISHED ? PostStatuses::DRAFTED : PostStatuses::PUBLISHED);

        $news->save();

        return new JsonResponse(['message' => 'user status updated!']);
    }
}
