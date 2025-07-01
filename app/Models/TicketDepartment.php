<?php

namespace App\Models;

use Database\Factories\TicketDepartmentFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static TicketDepartmentFactory factory($count = null, $state = [])
 * @method static Builder|TicketDepartment newModelQuery()
 * @method static Builder|TicketDepartment newQuery()
 * @method static Builder|TicketDepartment query()
 * @method static Builder|TicketDepartment whereCreatedAt($value)
 * @method static Builder|TicketDepartment whereDeletedAt($value)
 * @method static Builder|TicketDepartment whereId($value)
 * @method static Builder|TicketDepartment whereName($value)
 * @method static Builder|TicketDepartment whereUpdatedAt($value)
 * @property-read Collection<int, User> $user
 * @property-read int|null $user_count
 * @property-read Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @mixin Eloquent
 */
class TicketDepartment extends Model
{
    use HasFactory;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_departments', 'department_id','user_id');
    }
}
