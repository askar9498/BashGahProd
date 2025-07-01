<?php

namespace App\Http\Resources\EducationalService;

use App\Models\EducationalSubject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property User $user
 * @property mixed $end
 * @property mixed $start
 * @property mixed $time
 * @property EducationalSubject $subject
 * @property mixed $updated_at
 */
class EducationalCourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'time' => $this->time,
            'start' => $this->start,
            'end' => $this->end,
            'subject' => $this->subject->name,
            'subject_id' => $this->subject->id,
            'user_first_name' => $this->user->first_name,
            'user_last_name' => $this->user->last_name,
            'updated_at' => $this->updated_at
        ];
    }
}
