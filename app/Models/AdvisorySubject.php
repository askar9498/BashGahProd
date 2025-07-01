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
 * @method static Builder|AdvisorySubject newModelQuery()
 * @method static Builder|AdvisorySubject newQuery()
 * @method static Builder|AdvisorySubject query()
 * @method static Builder|AdvisorySubject whereCreatedAt($value)
 * @method static Builder|AdvisorySubject whereDeletedAt($value)
 * @method static Builder|AdvisorySubject whereId($value)
 * @method static Builder|AdvisorySubject whereName($value)
 * @method static Builder|AdvisorySubject whereUpdatedAt($value)
 * @method static \Database\Factories\AdvisorySubjectFactory factory($count = null, $state = [])
 * @mixin Eloquent
 */
class AdvisorySubject extends Model
{
    use HasFactory;
}
