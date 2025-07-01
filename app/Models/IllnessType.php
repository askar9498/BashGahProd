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
 * @method static Builder|IllnessType newModelQuery()
 * @method static Builder|IllnessType newQuery()
 * @method static Builder|IllnessType query()
 * @method static Builder|IllnessType whereCreatedAt($value)
 * @method static Builder|IllnessType whereDeletedAt($value)
 * @method static Builder|IllnessType whereId($value)
 * @method static Builder|IllnessType whereName($value)
 * @method static Builder|IllnessType whereUpdatedAt($value)
 * @method static \Database\Factories\IllnessTypeFactory factory($count = null, $state = [])
 * @mixin Eloquent
 */
class IllnessType extends Model
{
    use HasFactory;
}
