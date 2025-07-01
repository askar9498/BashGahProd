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
 * @property string|null $end
 * @property int $advisory_subject_id
 * @property float $amount
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|AdvisoryContract newModelQuery()
 * @method static Builder|AdvisoryContract newQuery()
 * @method static Builder|AdvisoryContract query()
 * @method static Builder|AdvisoryContract whereAdvisorySubjectId($value)
 * @method static Builder|AdvisoryContract whereAmount($value)
 * @method static Builder|AdvisoryContract whereCreatedAt($value)
 * @method static Builder|AdvisoryContract whereEnd($value)
 * @method static Builder|AdvisoryContract whereId($value)
 * @method static Builder|AdvisoryContract whereStart($value)
 * @method static Builder|AdvisoryContract whereTime($value)
 * @method static Builder|AdvisoryContract whereUpdatedAt($value)
 * @method static Builder|AdvisoryContract whereUserId($value)
 * @property-read \App\Models\AdvisorySubject $subject
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\AdvisoryContractFactory factory($count = null, $state = [])
 * @mixin Eloquent
 */
class AdvisoryContract extends Model
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
