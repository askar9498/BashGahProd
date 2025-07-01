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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Province newModelQuery()
 * @method static Builder|Province newQuery()
 * @method static Builder|Province query()
 * @method static Builder|Province whereCreatedAt($value)
 * @method static Builder|Province whereId($value)
 * @method static Builder|Province whereName($value)
 * @method static Builder|Province whereUpdatedAt($value)
 * @property string|null $deleted_at
 * @method static Builder|Province whereDeletedAt($value)
 * @mixin Eloquent
 */
class Province extends Model
{
    use HasFactory;
}
