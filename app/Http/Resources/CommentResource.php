<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $body
 * @property mixed $status
 * @property mixed $children
 * @property mixed $created_at
 * @property mixed $user
 * @property mixed $entity
 */
class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'status' => $this->status,
            'children' => CommentResource::collection($this->children) ?? null,
            'created_at' => $this->created_at,
            'user' => $this->user,
            'entity' => $this->entity,
        ];
    }
}
