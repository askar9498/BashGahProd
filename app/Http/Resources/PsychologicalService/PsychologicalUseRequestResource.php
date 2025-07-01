<?php

namespace App\Http\Resources\PsychologicalService;

use App\Models\PsychologicalCenter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property PsychologicalCenter $center
 * @property mixed $id
 * @property User $user
 * @property mixed $date
 * @property mixed $status
 * @property mixed $updated_at
 */
class PsychologicalUseRequestResource extends JsonResource
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
            'center' => $this->center->name,
            'center_id' => $this->center->id,
            'user_first_name' => $this->user->first_name,
            'user_last_name' => $this->user->last_name,
            'date' => $this->date,
            'status' => $this->status,
            'updated_at' => $this->updated_at
        ];
    }
}
