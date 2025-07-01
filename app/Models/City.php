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
 * @property string $name
 * @property int $province_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Province $province
 * @method static Builder|City newModelQuery()
 * @method static Builder|City newQuery()
 * @method static Builder|City query()
 * @method static Builder|City whereCreatedAt($value)
 * @method static Builder|City whereId($value)
 * @method static Builder|City whereName($value)
 * @method static Builder|City whereProvinceId($value)
 * @method static Builder|City whereUpdatedAt($value)
 * @property string|null $deleted_at
 * @method static Builder|City whereDeletedAt($value)
 * @mixin Eloquent
 */
class City extends Model
{
    use HasFactory;

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
