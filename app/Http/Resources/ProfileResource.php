<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $first_name
 * @property mixed $last_name
 * @property mixed $employee_number
 * @property mixed $national_id
 * @property mixed $start_date
 * @property mixed $end_date
 * @property mixed $retired_year
 * @property mixed $last_post
 * @property mixed $club_membership_date
 * @property mixed $club_validity_date
 * @property mixed $insurance_number
 * @property mixed $birth_certificate_number
 * @property mixed $cellphone
 * @property mixed $email
 * @property mixed $status
 * @property mixed $photo
 * @property mixed $birthCertificateImage
 * @property mixed $nationalCardImage
 * @property mixed $birth_date
 */
class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'employee_number' => $this->employee_number,
            'national_id' => $this->national_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'retired_year' => $this->retired_year,
            'birth_date' => $this->birth_date,
            'last_post' => $this->last_post,
            'club_membership_date' => $this->club_membership_date,
            'club_validity_date' => $this->club_validity_date,
            'insurance_number' => $this->insurance_number,
            'birth_certificate_number' => $this->birth_certificate_number,
            'cellphone' => $this->cellphone,
            'email' => $this->email,
            'status' => $this->status,
            'profile_photo' => $this->photo->download_link ?? null,
            'birth_certificate_image' => $this->birthCertificateImage->download_link ?? null,
            'national_card_image' => $this->nationalCardImage->download_link ?? null
        ];
    }
}
