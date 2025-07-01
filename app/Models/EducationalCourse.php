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
 * @property int $educational_subject_id
 * @property float $amount
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|EducationalCourse newModelQuery()
 * @method static Builder|EducationalCourse newQuery()
 * @method static Builder|EducationalCourse query()
 * @method static Builder|EducationalCourse whereAmount($value)
 * @method static Builder|EducationalCourse whereCreatedAt($value)
 * @method static Builder|EducationalCourse whereEducationalSubjectId($value)
 * @method static Builder|EducationalCourse whereEnd($value)
 * @method static Builder|EducationalCourse whereId($value)
 * @method static Builder|EducationalCourse whereStart($value)
 * @method static Builder|EducationalCourse whereTime($value)
 * @method static Builder|EducationalCourse whereUpdatedAt($value)
 * @method static Builder|EducationalCourse whereUserId($value)
 * @property-read \App\Models\EducationalSubject $subject
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\EducationalCourseFactory factory($count = null, $state = [])
 * @mixin Eloquent
 */
class EducationalCourse extends Model
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
