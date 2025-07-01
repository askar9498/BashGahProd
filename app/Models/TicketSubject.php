<?php

namespace App\Models;

use Database\Factories\TicketSubjectFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @method static Builder|TicketSubject newModelQuery()
 * @method static Builder|TicketSubject newQuery()
 * @method static Builder|TicketSubject query()
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static TicketSubjectFactory factory($count = null, $state = [])
 * @method static Builder|TicketSubject whereCreatedAt($value)
 * @method static Builder|TicketSubject whereDeletedAt($value)
 * @method static Builder|TicketSubject whereId($value)
 * @method static Builder|TicketSubject whereName($value)
 * @method static Builder|TicketSubject whereUpdatedAt($value)
 * @mixin Eloquent
 */
class TicketSubject extends Model
{
    use HasFactory;
}
