<?php

namespace App\Http\Controllers\Web\Panel\Admin;

use App\Enums\PostStatuses;
use App\Enums\PostType;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostDetailResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $params): JsonResponse
    {
        /** @var Post $post */
        $post = Post::query()->whereStatus(PostStatuses::PUBLISHED)->whereType(PostType::PANEL_NOTICE);

        if (!empty($params->category_id)) {
            $post = $post->whereCategoryId($params->category_id);
        }

        return PostResource::collection($post->orderByDesc('created_at')->paginate(10)->load(['category', 'image']))->response();
    }

    public function show($slug): JsonResponse
    {
        $post = Post::query()->whereSlug($slug)->whereStatus(PostStatuses::PUBLISHED)->firstOrFail();

        return new JsonResponse(['post' => new PostDetailResource($post)]);
    }
}
