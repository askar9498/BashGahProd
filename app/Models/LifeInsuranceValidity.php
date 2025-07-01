<?php

namespace App\Models;

use Database\Factories\LifeInsuranceValidityFactory;
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
 * @property string $start
 * @property string $end
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static LifeInsuranceValidityFactory factory($count = null, $state = [])
 * @method static Builder|LifeInsuranceValidity newModelQuery()
 * @method static Builder|LifeInsuranceValidity newQuery()
 * @method static Builder|LifeInsuranceValidity query()
 * @method static Builder|LifeInsuranceValidity whereCreatedAt($value)
 * @method static Builder|LifeInsuranceValidity whereEnd($value)
 * @method static Builder|LifeInsuranceValidity whereId($value)
 * @method static Builder|LifeInsuranceValidity whereStart($value)
 * @method static Builder|LifeInsuranceValidity whereUpdatedAt($value)
 * @method static Builder|LifeInsuranceValidity whereUserId($value)
 * @property-read \App\Models\User $user
 * @mixin Eloquent
 */
class LifeInsuranceValidity extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
