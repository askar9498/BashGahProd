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
 * @property int $time
 * @property string $start
 * @property string $end
 * @property int $advisory_subject_id
 * @property int $status
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|AdvisoryRequest newModelQuery()
 * @method static Builder|AdvisoryRequest newQuery()
 * @method static Builder|AdvisoryRequest query()
 * @method static Builder|AdvisoryRequest whereAdvisorySubjectId($value)
 * @method static Builder|AdvisoryRequest whereCreatedAt($value)
 * @method static Builder|AdvisoryRequest whereEnd($value)
 * @method static Builder|AdvisoryRequest whereId($value)
 * @method static Builder|AdvisoryRequest whereStart($value)
 * @method static Builder|AdvisoryRequest whereStatus($value)
 * @method static Builder|AdvisoryRequest whereTime($value)
 * @method static Builder|AdvisoryRequest whereUpdatedAt($value)
 * @method static Builder|AdvisoryRequest whereUserId($value)
 * @property-read \App\Models\AdvisorySubject $subject
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\AdvisoryRequestFactory factory($count = null, $state = [])
 * @mixin Eloquent
 */
class AdvisoryRequest extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(AdvisorySubject::class, 'advisory_subject_id');
    }
}
