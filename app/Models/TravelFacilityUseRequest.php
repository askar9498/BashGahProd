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
 * @property int $count
 * @property int $start
 * @property int $end
 * @property int $city_id
 * @property int $status
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|TravelFacilityUseRequest newModelQuery()
 * @method static Builder|TravelFacilityUseRequest newQuery()
 * @method static Builder|TravelFacilityUseRequest query()
 * @method static Builder|TravelFacilityUseRequest whereCityId($value)
 * @method static Builder|TravelFacilityUseRequest whereCount($value)
 * @method static Builder|TravelFacilityUseRequest whereCreatedAt($value)
 * @method static Builder|TravelFacilityUseRequest whereEnd($value)
 * @method static Builder|TravelFacilityUseRequest whereId($value)
 * @method static Builder|TravelFacilityUseRequest whereStart($value)
 * @method static Builder|TravelFacilityUseRequest whereStatus($value)
 * @method static Builder|TravelFacilityUseRequest whereUpdatedAt($value)
 * @method static Builder|TravelFacilityUseRequest whereUserId($value)
 * @property-read \App\Models\City $city
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\TravelFacilityUseRequestFactory factory($count = null, $state = [])
 * @mixin Eloquent
 */
class TravelFacilityUseRequest extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
