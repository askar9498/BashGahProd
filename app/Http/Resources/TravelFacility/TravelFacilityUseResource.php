<?php

namespace App\Http\Resources\TravelFacility;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property User $user
 * @property mixed $end
 * @property mixed $start
 * @property mixed $count
 * @property City $city
 */
class TravelFacilityUseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'count' => $this->count,
            'start' => $this->start,
            'end' => $this->end,
            'user_first_name' => $this->user->first_name,
            'user_last_name' => $this->user->last_name,
            'city' => $this->city->name,
            'city_id' => $this->city->id
        ];
    }
}
