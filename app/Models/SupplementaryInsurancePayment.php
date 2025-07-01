<?php

namespace App\Models;

use Database\Factories\SupplementaryInsurancePaymentFactory;
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
 * @property int $type
 * @property int $user_id
 * @property int $dependent_id
 * @property float $amount
 * @property string $medical_center
 * @property string|null $illness_date
 * @property string|null $remittance_date
 * @property string|null $register_date
 * @property string|null $validity_date
 * @property int $illness_id
 * @property int $illness_type_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static SupplementaryInsurancePaymentFactory factory($count = null, $state = [])
 * @method static Builder|SupplementaryInsurancePayment newModelQuery()
 * @method static Builder|SupplementaryInsurancePayment newQuery()
 * @method static Builder|SupplementaryInsurancePayment query()
 * @method static Builder|SupplementaryInsurancePayment whereAmount($value)
 * @method static Builder|SupplementaryInsurancePayment whereCreatedAt($value)
 * @method static Builder|SupplementaryInsurancePayment whereDependentId($value)
 * @method static Builder|SupplementaryInsurancePayment whereId($value)
 * @method static Builder|SupplementaryInsurancePayment whereIllnessDate($value)
 * @method static Builder|SupplementaryInsurancePayment whereIllnessId($value)
 * @method static Builder|SupplementaryInsurancePayment whereIllnessTypeId($value)
 * @method static Builder|SupplementaryInsurancePayment whereMedicalCenter($value)
 * @method static Builder|SupplementaryInsurancePayment whereRegisterDate($value)
 * @method static Builder|SupplementaryInsurancePayment whereRemittanceDate($value)
 * @method static Builder|SupplementaryInsurancePayment whereType($value)
 * @method static Builder|SupplementaryInsurancePayment whereUpdatedAt($value)
 * @method static Builder|SupplementaryInsurancePayment whereUserId($value)
 * @method static Builder|SupplementaryInsurancePayment whereValidityDate($value)
 * @property-read \App\Models\Dependent $dependent
 * @property-read \App\Models\Illness $illness
 * @property-read \App\Models\IllnessType $illnessType
 * @property-read \App\Models\User $user
 * @mixin Eloquent
 */
class SupplementaryInsurancePayment extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dependent(): BelongsTo
    {
        return $this->belongsTo(Dependent::class, 'dependent_id');
    }

    public function illness(): BelongsTo
    {
        return $this->belongsTo(Illness::class, 'illness_id');
    }

    public function illnessType(): BelongsTo
    {
        return $this->belongsTo(IllnessType::class, 'illness_type_id');
    }
}
