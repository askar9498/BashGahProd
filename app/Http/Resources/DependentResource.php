<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $gender
 * @property mixed $first_name
 * @property mixed $last_name
 * @property mixed $national_id
 * @property mixed $relationship
 * @property mixed $birth_date
 * @property mixed $father_name
 * @property mixed $insured_code
 * @property mixed $cellphone
 * @property mixed $birth_certificate_number
 * @property mixed $city
 * @property mixed $supervisor
 */
class DependentResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'national_id' => $this->national_id,
            'relationship' => $this->relationship,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date,
            'father_name' => $this->father_name,
            'supervisor_first_name' => $this->supervisor->first_name ?? null,
            'supervisor_last_name' => $this->supervisor->last_name ?? null,
            'birth_city' => $this->city->name ?? null,
            'insured_code' => $this->insured_code,
            'cellphone' => $this->cellphone,
            'birth_certificate_number' => $this->birth_certificate_number,
            'birth_city_id' => $this->birth_city_id,
            'province_id' => $this->city->province_id ?? null,
        ];
    }
}
