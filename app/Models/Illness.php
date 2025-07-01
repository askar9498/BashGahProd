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
 * @method static Builder|Illness newModelQuery()
 * @method static Builder|Illness newQuery()
 * @method static Builder|Illness query()
 * @method static Builder|Illness whereCreatedAt($value)
 * @method static Builder|Illness whereDeletedAt($value)
 * @method static Builder|Illness whereId($value)
 * @method static Builder|Illness whereName($value)
 * @method static Builder|Illness whereUpdatedAt($value)
 * @method static \Database\Factories\IllnessFactory factory($count = null, $state = [])
 * @mixin Eloquent
 */
class Illness extends Model
{
    use HasFactory;
}
