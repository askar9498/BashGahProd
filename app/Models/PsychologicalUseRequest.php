<?php

namespace App\Models;

use Database\Factories\PsychologicalUseRequestFactory;
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
 * @property int $center_id
 * @property int $user_id
 * @property string $date
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|PsychologicalUseRequest newModelQuery()
 * @method static Builder|PsychologicalUseRequest newQuery()
 * @method static Builder|PsychologicalUseRequest query()
 * @method static Builder|PsychologicalUseRequest whereCenterId($value)
 * @method static Builder|PsychologicalUseRequest whereCreatedAt($value)
 * @method static Builder|PsychologicalUseRequest whereDate($value)
 * @method static Builder|PsychologicalUseRequest whereId($value)
 * @method static Builder|PsychologicalUseRequest whereStatus($value)
 * @method static Builder|PsychologicalUseRequest whereUpdatedAt($value)
 * @method static Builder|PsychologicalUseRequest whereUserId($value)
 * @method static PsychologicalUseRequestFactory factory($count = null, $state = [])
 * @property-read \App\Models\PsychologicalCenter $center
 * @property-read \App\Models\User $user
 * @mixin Eloquent
 */
class PsychologicalUseRequest extends Model
{
    use HasFactory;

    public function center(): BelongsTo
    {
        return $this->belongsTo(PsychologicalCenter::class,'center_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
