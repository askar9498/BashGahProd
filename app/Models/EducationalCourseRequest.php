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
 * @property int $educational_subject_id
 * @property int $status
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|EducationalCourseRequest newModelQuery()
 * @method static Builder|EducationalCourseRequest newQuery()
 * @method static Builder|EducationalCourseRequest query()
 * @method static Builder|EducationalCourseRequest whereCreatedAt($value)
 * @method static Builder|EducationalCourseRequest whereEducationalSubjectId($value)
 * @method static Builder|EducationalCourseRequest whereEnd($value)
 * @method static Builder|EducationalCourseRequest whereId($value)
 * @method static Builder|EducationalCourseRequest whereStart($value)
 * @method static Builder|EducationalCourseRequest whereStatus($value)
 * @method static Builder|EducationalCourseRequest whereTime($value)
 * @method static Builder|EducationalCourseRequest whereUpdatedAt($value)
 * @method static Builder|EducationalCourseRequest whereUserId($value)
 * @property-read \App\Models\EducationalSubject $subject
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\EducationalCourseRequestFactory factory($count = null, $state = [])
 * @mixin Eloquent
 */
class EducationalCourseRequest extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(EducationalSubject::class,'educational_subject_id');
    }
}
