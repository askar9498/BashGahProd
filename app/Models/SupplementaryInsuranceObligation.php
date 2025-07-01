<?php

namespace App\Models;

use Database\Factories\SupplementaryInsuranceObligationFactory;
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
 * @method static SupplementaryInsuranceObligationFactory factory($count = null, $state = [])
 * @method static Builder|SupplementaryInsuranceObligation newModelQuery()
 * @method static Builder|SupplementaryInsuranceObligation newQuery()
 * @method static Builder|SupplementaryInsuranceObligation query()
 * @method static Builder|SupplementaryInsuranceObligation whereAmount($value)
 * @method static Builder|SupplementaryInsuranceObligation whereCreatedAt($value)
 * @method static Builder|SupplementaryInsuranceObligation whereDescription($value)
 * @method static Builder|SupplementaryInsuranceObligation whereId($value)
 * @method static Builder|SupplementaryInsuranceObligation whereUpdatedAt($value)
 * @property int $franchise
 * @method static Builder|SupplementaryInsuranceObligation whereFranchise($value)
 * @mixin Eloquent
 */
class SupplementaryInsuranceObligation extends Model
{
    use HasFactory;
}
