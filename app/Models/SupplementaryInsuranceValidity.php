<?php

namespace App\Models;

use Database\Factories\SupplementaryInsuranceValidityFactory;
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
 * @method static SupplementaryInsuranceValidityFactory factory($count = null, $state = [])
 * @method static Builder|SupplementaryInsuranceValidity newModelQuery()
 * @method static Builder|SupplementaryInsuranceValidity newQuery()
 * @method static Builder|SupplementaryInsuranceValidity query()
 * @method static Builder|SupplementaryInsuranceValidity whereCreatedAt($value)
 * @method static Builder|SupplementaryInsuranceValidity whereEnd($value)
 * @method static Builder|SupplementaryInsuranceValidity whereId($value)
 * @method static Builder|SupplementaryInsuranceValidity whereStart($value)
 * @method static Builder|SupplementaryInsuranceValidity whereUpdatedAt($value)
 * @method static Builder|SupplementaryInsuranceValidity whereUserId($value)
 * @property-read \App\Models\User $user
 * @mixin Eloquent
 */
class SupplementaryInsuranceValidity extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
