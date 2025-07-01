<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $title
 * @property mixed $slug
 * @property mixed $description
 * @property mixed $body
 * @property mixed $attachments
 * @property mixed $created_at
 */
class PostDetailResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'body' => $this->body,
            'image' => $this->image->download_link ?? null,
            'attachments' => FileResource::collection($this->attachments),
            'created_at' => $this->created_at
        ];
    }
}
