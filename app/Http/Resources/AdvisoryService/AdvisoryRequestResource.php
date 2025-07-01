<?php

namespace App\Http\Resources\AdvisoryService;

use App\Models\AdvisorySubject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property User $user
 * @property mixed $end
 * @property mixed $start
 * @property mixed $time
 * @property AdvisorySubject $subject
 * @property mixed $status
 * @property mixed $updated_at
 */
class AdvisoryRequestResource extends JsonResource
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
            'time' => $this->time,
            'start' => $this->start,
            'end' => $this->end,
            'subject' => $this->subject->name,
            'status' => $this->status,
            'user_first_name' => $this->user->first_name,
            'user_last_name' => $this->user->last_name,
            'updated_at' => $this->updated_at

        ];
    }
}
