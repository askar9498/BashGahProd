<?php

namespace App\Models;

use Database\Factories\TicketFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use React\Dns\Model\Message;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $subject_id
 * @property string $title
 * @property int $priority
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $status
 * @method static Builder|Ticket newModelQuery()
 * @method static Builder|Ticket newQuery()
 * @method static Builder|Ticket query()
 * @method static Builder|Ticket whereCreatedAt($value)
 * @method static Builder|Ticket whereId($value)
 * @method static Builder|Ticket wherePriority($value)
 * @method static Builder|Ticket whereStatus($value)
 * @method static Builder|Ticket whereSubjectId($value)
 * @method static Builder|Ticket whereTitle($value)
 * @method static Builder|Ticket whereUpdatedAt($value)
 * @method static Builder|Ticket whereUserId($value)
 * @property int $department_id
 * @property-read Collection<int, TicketMessage> $messages
 * @property-read int|null $messages_count
 * @property-read User $subject
 * @property-read Collection<int, TicketMessage> $unreadMessages
 * @property-read int|null $unread_messages_count
 * @property-read User|null $user
 * @method static TicketFactory factory($count = null, $state = [])
 * @method static Builder|Ticket whereDepartmentId($value)
 * @property int|null $referred_id
 * @property string $ticket_id
 * @method static Builder|Ticket whereReferredId($value)
 * @method static Builder|Ticket whereTicketId($value)
 * @property-read \App\Models\TicketDepartment $department
 * @mixin Eloquent
 */
class Ticket extends Model
{
    use HasFactory;

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($ticket) {
            $ticket->ticket_id = null;
        });

        static::created(function ($ticket) {
            $ticket->ticket_id = 'TKT-' . str_pad($ticket->id, 6, '0', STR_PAD_LEFT);
            $ticket->saveQuietly();
        });
    }

    public function messages(): HasMany
    {
        return $this->hasMany(TicketMessage::class, 'ticket_id');
    }

    public function unreadMessages(): HasMany
    {
        return $this->hasMany(TicketMessage::class, 'ticket_id')->where('user_id', '!=', \Auth::guard('api')->id())->where('is_read', false);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(TicketSubject::class, 'subject_id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(TicketDepartment::class, 'subject_id');
    }


}
