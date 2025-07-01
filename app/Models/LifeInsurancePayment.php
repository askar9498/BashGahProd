<?php

namespace App\Models;

use Database\Factories\LifeInsurancePaymentFactory;
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
 * @property-read User $user
 * @method static LifeInsurancePaymentFactory factory($count = null, $state = [])
 * @method static Builder|LifeInsurancePayment newModelQuery()
 * @method static Builder|LifeInsurancePayment newQuery()
 * @method static Builder|LifeInsurancePayment query()
 * @method static Builder|LifeInsurancePayment whereAmount($value)
 * @method static Builder|LifeInsurancePayment whereCreatedAt($value)
 * @method static Builder|LifeInsurancePayment whereDate($value)
 * @method static Builder|LifeInsurancePayment whereDescription($value)
 * @method static Builder|LifeInsurancePayment whereId($value)
 * @method static Builder|LifeInsurancePayment whereUpdatedAt($value)
 * @method static Builder|LifeInsurancePayment whereUserId($value)
 * @mixin Eloquent
 */
class LifeInsurancePayment extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
