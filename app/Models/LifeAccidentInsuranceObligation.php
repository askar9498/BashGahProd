<?php

namespace App\Models;

use Database\Factories\LifeAccidentInsuranceObligationFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id
 * @property string $description
 * @property float $amount
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static LifeAccidentInsuranceObligationFactory factory($count = null, $state = [])
 * @method static Builder|LifeAccidentInsuranceObligation newModelQuery()
 * @method static Builder|LifeAccidentInsuranceObligation newQuery()
 * @method static Builder|LifeAccidentInsuranceObligation query()
 * @method static Builder|LifeAccidentInsuranceObligation whereAmount($value)
 * @method static Builder|LifeAccidentInsuranceObligation whereCreatedAt($value)
 * @method static Builder|LifeAccidentInsuranceObligation whereDescription($value)
 * @method static Builder|LifeAccidentInsuranceObligation whereId($value)
 * @method static Builder|LifeAccidentInsuranceObligation whereUpdatedAt($value)
 * @mixin Eloquent
 */
class LifeAccidentInsuranceObligation extends Model
{
    use HasFactory;
}
