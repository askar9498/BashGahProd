<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SupplementaryInsuranceSpecialFacility newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupplementaryInsuranceSpecialFacility newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupplementaryInsuranceSpecialFacility query()
 * @method static \Illuminate\Database\Eloquent\Builder|SupplementaryInsuranceSpecialFacility whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplementaryInsuranceSpecialFacility whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplementaryInsuranceSpecialFacility whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SupplementaryInsuranceSpecialFacility extends Model
{
    use HasFactory;
}
