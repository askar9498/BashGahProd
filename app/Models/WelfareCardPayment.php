<?php

namespace App\Models;

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
 * @property int $user_id
 * @property string $date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|WelfareCardPayment newModelQuery()
 * @method static Builder|WelfareCardPayment newQuery()
 * @method static Builder|WelfareCardPayment query()
 * @method static Builder|WelfareCardPayment whereAmount($value)
 * @method static Builder|WelfareCardPayment whereCreatedAt($value)
 * @method static Builder|WelfareCardPayment whereDate($value)
 * @method static Builder|WelfareCardPayment whereDescription($value)
 * @method static Builder|WelfareCardPayment whereId($value)
 * @method static Builder|WelfareCardPayment whereUpdatedAt($value)
 * @method static Builder|WelfareCardPayment whereUserId($value)
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\WelfareCardPaymentFactory factory($count = null, $state = [])
 * @mixin Eloquent
 */
class WelfareCardPayment extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
