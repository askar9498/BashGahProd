<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $user
 * @property mixed $amount
 * @property mixed $date
 * @property mixed $description
 * @property mixed $id
 */
class WelfareCardPaymentResource extends JsonResource
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
            'amount' => $this->amount,
            'description' => $this->description,
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'date' => $this->date
        ];
    }
}
