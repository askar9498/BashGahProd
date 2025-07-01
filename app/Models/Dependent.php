<?php

namespace App\Models;

use Database\Factories\DependentFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $national_id
 * @property int $relationship
 * @property int $gender
 * @property string $birth_date
 * @property string $father_name
 * @property int $supervisor_id
 * @property int $birth_city_id
 * @property string|null $insured_code
 * @property string $cellphone
 * @property string $birth_certificate_number
 * @property int|null $national_card_image_id
 * @property int|null $birth_certificate_image_id
 * @property int|null $photo_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read City $city
 * @property-read User $supervisor
 * @method static DependentFactory factory($count = null, $state = [])
 * @method static Builder|Dependent newModelQuery()
 * @method static Builder|Dependent newQuery()
 * @method static Builder|Dependent query()
 * @method static Builder|Dependent whereBirthCertificateImageId($value)
 * @method static Builder|Dependent whereBirthCertificateNumber($value)
 * @method static Builder|Dependent whereBirthCityId($value)
 * @method static Builder|Dependent whereBirthDate($value)
 * @method static Builder|Dependent whereCellphone($value)
 * @method static Builder|Dependent whereCreatedAt($value)
 * @method static Builder|Dependent whereFatherName($value)
 * @method static Builder|Dependent whereFirstName($value)
 * @method static Builder|Dependent whereGender($value)
 * @method static Builder|Dependent whereId($value)
 * @method static Builder|Dependent whereInsuredCode($value)
 * @method static Builder|Dependent whereLastName($value)
 * @method static Builder|Dependent whereNationalCardImageId($value)
 * @method static Builder|Dependent whereNationalId($value)
 * @method static Builder|Dependent wherePhotoId($value)
 * @method static Builder|Dependent whereRelationship($value)
 * @method static Builder|Dependent whereSupervisorId($value)
 * @method static Builder|Dependent whereUpdatedAt($value)
 * @property int|null $is_supplementary_insuranced
 * @method static Builder|Dependent whereIsSupplementaryInsuranced($value)
 * @mixin Eloquent
 */
class Dependent extends Model
{
    use HasFactory;

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'birth_city_id');
    }
}
