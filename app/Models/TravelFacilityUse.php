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
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|TravelFacilityUse newModelQuery()
 * @method static Builder|TravelFacilityUse newQuery()
 * @method static Builder|TravelFacilityUse query()
 * @method static Builder|TravelFacilityUse whereCityId($value)
 * @method static Builder|TravelFacilityUse whereCount($value)
 * @method static Builder|TravelFacilityUse whereCreatedAt($value)
 * @method static Builder|TravelFacilityUse whereEnd($value)
 * @method static Builder|TravelFacilityUse whereId($value)
 * @method static Builder|TravelFacilityUse whereStart($value)
 * @method static Builder|TravelFacilityUse whereUpdatedAt($value)
 * @method static Builder|TravelFacilityUse whereUserId($value)
 * @property-read \App\Models\City $city
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\TravelFacilityUseFactory factory($count = null, $state = [])
 * @mixin Eloquent
 */
class TravelFacilityUse extends Model
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
