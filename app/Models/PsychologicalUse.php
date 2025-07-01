<?php

namespace App\Models;

use Database\Factories\PsychologicalUseFactory;
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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|PsychologicalUse newModelQuery()
 * @method static Builder|PsychologicalUse newQuery()
 * @method static Builder|PsychologicalUse query()
 * @method static Builder|PsychologicalUse whereCenterId($value)
 * @method static Builder|PsychologicalUse whereCreatedAt($value)
 * @method static Builder|PsychologicalUse whereDate($value)
 * @method static Builder|PsychologicalUse whereId($value)
 * @method static Builder|PsychologicalUse whereUpdatedAt($value)
 * @method static Builder|PsychologicalUse whereUserId($value)
 * @method static PsychologicalUseFactory factory($count = null, $state = [])
 * @property-read \App\Models\PsychologicalCenter $center
 * @property-read \App\Models\User $user
 * @mixin Eloquent
 */
class PsychologicalUse extends Model
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
