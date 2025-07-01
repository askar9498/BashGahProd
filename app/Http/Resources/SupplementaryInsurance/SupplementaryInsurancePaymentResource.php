<?php

namespace App\Http\Resources\SupplementaryInsurance;

use App\Enums\SupplementaryInsurancePaymentType;
use App\Models\Dependent;
use App\Models\Illness;
use App\Models\IllnessType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property User $user
 * @property Dependent $dependent
 * @property mixed $amount
 * @property Illness $illness
 * @property IllnessType $illnessType
 * @property mixed $validity_date
 * @property mixed $register_date
 * @property mixed $remittance_date
 * @property mixed $illness_date
 * @property mixed $medical_center
 * @property mixed $type
 */
class SupplementaryInsurancePaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => $this->type,
            'user_first_name' => $this->user->first_name??null,
            'user_last_name' => $this->user->last_name??null,
            'dependent_first_name' => $this->dependent->first_name??null,
            'dependent_last_name' => $this->dependent->last_name??null,
            'dependent_id' => $this->dependent->id??null,
            'amount' => $this->amount,
            'medical_center' => $this->medical_center,
            'illness_date' => $this->illness_date,
            'remittance_date' => $this->remittance_date,
            'register_date' => $this->register_date,
            'validity_date' => $this->validity_date,
            'illness' => $this->illness->name??null,
            'illness_id' => $this->illness->id??null,
            'illness_type' => $this->illnessType->name??null,
            'illness_type_id' => $this->illnessType->id??null
        ];
    }
}
