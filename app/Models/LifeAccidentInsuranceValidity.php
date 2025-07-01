<?php

namespace App\Models;

use Database\Factories\LifeAccidentInsuranceValidityFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Route;

/**
 * 
 *
 * @property int $id
 * @property string $start
 * @property string $end
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static LifeAccidentInsuranceValidityFactory factory($count = null, $state = [])
 * @method static Builder|LifeAccidentInsuranceValidity newModelQuery()
 * @method static Builder|LifeAccidentInsuranceValidity newQuery()
 * @method static Builder|LifeAccidentInsuranceValidity query()
 * @method static Builder|LifeAccidentInsuranceValidity whereCreatedAt($value)
 * @method static Builder|LifeAccidentInsuranceValidity whereEnd($value)
 * @method static Builder|LifeAccidentInsuranceValidity whereId($value)
 * @method static Builder|LifeAccidentInsuranceValidity whereStart($value)
 * @method static Builder|LifeAccidentInsuranceValidity whereUpdatedAt($value)
 * @method static Builder|LifeAccidentInsuranceValidity whereUserId($value)
 * @property-read User $user
 * @mixin Eloquent
 */
class LifeAccidentInsuranceValidity extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
