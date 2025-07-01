<?php

namespace App\Http\Controllers\Web\Panel\Admin\Comment;

use App\Enums\CommentEntities;
use App\Enums\CommentReadStatuses;
use App\Enums\CommentStatuses;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentFormRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $params): Factory|View|Application
    {
        $comments = Comment::whereParentId(null)
            ->with(['entity', 'user', 'user.photo']);

        return view("dashboard.panel.admin.comments.index")->with([
            'title' => 'لیست نظرات', 'comments' => CommentResource::collection($comments->orderByDesc('id')->paginate(10))
        ]);

    }

    /**
     * @param Comment $comment
     * @return JsonResponse
     */
    public function show(Comment $comment): JsonResponse
    {
        if ($comment->user_id != Auth::id()) {
            $comment->is_read = CommentReadStatuses::READ;
            $comment->save();
        }

        $comment->load(['entity', 'user', 'user.photo', 'children']);
        return response()->json(new CommentResource($comment));
    }

    /**
     * @param CommentFormRequest $request
     * @return JsonResponse
     */
    public function store(CommentFormRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $comment = new Comment();
        $comment->body = $validatedData['body'];
        $comment->user_id = Auth::id();
        $comment->entity_type = CommentEntities::EntityClasses[$validatedData['entity_type'] ?? 'unknown'];
        $comment->entity_id = $validatedData['entity_id'] ?? null;
        $comment->status = CommentStatuses::CONFIRMED;

        if (!empty($validatedData['parent_id'])) {
            $comment->parent_id = $validatedData['parent_id'];
            $parent = Comment::whereId($validatedData['parent_id'])->firstOrFail();

            $comment->entity_type = $parent->entity_type;
            $comment->entity_id = $parent->entity_id;
        }

        $comment->save();

        return new JsonResponse(['message' => trans('messages.public.created'), 'comment' => $comment]);
    }

    /**
     * @param Request $request
     * @param Comment $comment
     * @return JsonResponse
     */
    public function update(Request $request, Comment $comment): JsonResponse
    {
        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        $comment->body = $validatedData['body'];
        $comment->save();

        return new JsonResponse(['message' => trans('messages.public.updated'), 'comment' => $comment]);
    }

    /**
     * @param Comment $comment
     * @return JsonResponse
     */
    public function destroy(Comment $comment): JsonResponse
    {
        Comment::whereParentId($comment->id)->delete();

        $comment->delete();

        return new JsonResponse(['message' => trans('messages.public.deleted')]);
    }


    /**
     * @param Comment $comment
     * @return JsonResponse
     */
    public function confirm(Comment $comment): JsonResponse
    {
        $comment->status = CommentStatuses::CONFIRMED;
        $comment->is_read = CommentReadStatuses::READ;
        $comment->save();

        return new JsonResponse(['message' => trans('messages.comment.confirmed')]);
    }

    /**
     * @param Comment $comment
     * @return JsonResponse
     */
    public function reject(Comment $comment): JsonResponse
    {
        $comment->status = CommentStatuses::REJECTED;
        $comment->is_read = CommentReadStatuses::READ;
        $comment->save();

        Comment::whereParentId($comment->id)->update(['status' => CommentStatuses::REJECTED]);

        return new JsonResponse(['message' => trans('messages.comment.rejected')]);
    }
}
