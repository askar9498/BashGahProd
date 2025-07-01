<?php

namespace App\Models;

use Database\Factories\PsychologicalCenterFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @method static Builder|PsychologicalCenter newModelQuery()
 * @method static Builder|PsychologicalCenter newQuery()
 * @method static Builder|PsychologicalCenter query()
 * @method static PsychologicalCenterFactory factory($count = null, $state = [])
 * @property int $id
 * @property string $name
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|PsychologicalCenter whereCreatedAt($value)
 * @method static Builder|PsychologicalCenter whereDeletedAt($value)
 * @method static Builder|PsychologicalCenter whereId($value)
 * @method static Builder|PsychologicalCenter whereName($value)
 * @method static Builder|PsychologicalCenter whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PsychologicalCenter extends Model
{
    use HasFactory;
}
