<?php

namespace App\Models;

use Database\Factories\LifeAccidentInsurancePaymentFactory;
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
 * @property float $amount
 * @property string|null $description
 * @property string $date
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static LifeAccidentInsurancePaymentFactory factory($count = null, $state = [])
 * @method static Builder|LifeAccidentInsurancePayment newModelQuery()
 * @method static Builder|LifeAccidentInsurancePayment newQuery()
 * @method static Builder|LifeAccidentInsurancePayment query()
 * @method static Builder|LifeAccidentInsurancePayment whereAmount($value)
 * @method static Builder|LifeAccidentInsurancePayment whereCreatedAt($value)
 * @method static Builder|LifeAccidentInsurancePayment whereDate($value)
 * @method static Builder|LifeAccidentInsurancePayment whereDescription($value)
 * @method static Builder|LifeAccidentInsurancePayment whereId($value)
 * @method static Builder|LifeAccidentInsurancePayment whereUpdatedAt($value)
 * @method static Builder|LifeAccidentInsurancePayment whereUserId($value)
 * @property-read \App\Models\User $user
 * @mixin Eloquent
 */
class LifeAccidentInsurancePayment extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
