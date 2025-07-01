<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|EducationalSubject newModelQuery()
 * @method static Builder|EducationalSubject newQuery()
 * @method static Builder|EducationalSubject query()
 * @method static Builder|EducationalSubject whereCreatedAt($value)
 * @method static Builder|EducationalSubject whereDeletedAt($value)
 * @method static Builder|EducationalSubject whereId($value)
 * @method static Builder|EducationalSubject whereName($value)
 * @method static Builder|EducationalSubject whereUpdatedAt($value)
 * @method static \Database\Factories\EducationalSubjectFactory factory($count = null, $state = [])
 * @mixin Eloquent
 */
class EducationalSubject extends Model
{
    use HasFactory;
}
