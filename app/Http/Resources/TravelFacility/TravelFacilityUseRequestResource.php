<?php

namespace App\Http\Resources\TravelFacility;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property User $user
 * @property mixed $id
 * @property mixed $end
 * @property mixed $start
 * @property mixed $count
 * @property mixed $status
 * @property City $city
 * @property mixed $updated_at
 */
class TravelFacilityUseRequestResource extends JsonResource
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
            'count' => $this->count,
            'start' => $this->start,
            'end' => $this->end,
            'status' => $this->status,
            'user_first_name' => $this->user->first_name,
            'user_last_name' => $this->user->last_name,
            'city' => $this->city->name,
            'city_id' => $this->city->id,
            'updated_at' => $this->updated_at
        ];
    }
}
