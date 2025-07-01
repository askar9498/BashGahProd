<?php

namespace App\Models;

use Database\Factories\LifeInsuranceObligationFactory;
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
 * @method static LifeInsuranceObligationFactory factory($count = null, $state = [])
 * @method static Builder|LifeInsuranceObligation newModelQuery()
 * @method static Builder|LifeInsuranceObligation newQuery()
 * @method static Builder|LifeInsuranceObligation query()
 * @method static Builder|LifeInsuranceObligation whereAmount($value)
 * @method static Builder|LifeInsuranceObligation whereCreatedAt($value)
 * @method static Builder|LifeInsuranceObligation whereDescription($value)
 * @method static Builder|LifeInsuranceObligation whereId($value)
 * @method static Builder|LifeInsuranceObligation whereUpdatedAt($value)
 * @property string|null $insurance_no
 * @property string|null $insurance_company
 * @property string|null $insurance_year
 * @property float $insurance_premium
 * @method static Builder|LifeInsuranceObligation whereInsuranceCompany($value)
 * @method static Builder|LifeInsuranceObligation whereInsuranceNo($value)
 * @method static Builder|LifeInsuranceObligation whereInsurancePremium($value)
 * @method static Builder|LifeInsuranceObligation whereInsuranceYear($value)
 * @mixin Eloquent
 */
class LifeInsuranceObligation extends Model
{
    use HasFactory;
}
