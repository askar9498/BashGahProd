<?php

namespace App\Models;

use App\Enums\CommentLikeTypes;
use App\Enums\CommentStatuses;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id
 * @property string $body
 * @property string $entity_type
 * @property int $entity_id
 * @property int $status
 * @property int $user_id
 * @property int|null $parent_id
 * @property int $is_read
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Comment> $children
 * @property-read int|null $children_count
 * @property-read Collection<int, CommentLike> $dislikes
 * @property-read int|null $dislikes_count
 * @property-read Model|Eloquent $entity
 * @property-read Collection<int, CommentLike> $likes
 * @property-read int|null $likes_count
 * @property-read Comment|null $parent
 * @property-read User $user
 * @method static Builder|Comment newModelQuery()
 * @method static Builder|Comment newQuery()
 * @method static Builder|Comment onlyTrashed()
 * @method static Builder|Comment query()
 * @method static Builder|Comment whereBody($value)
 * @method static Builder|Comment whereCreatedAt($value)
 * @method static Builder|Comment whereDeletedAt($value)
 * @method static Builder|Comment whereEntityId($value)
 * @method static Builder|Comment whereEntityType($value)
 * @method static Builder|Comment whereId($value)
 * @method static Builder|Comment whereIsRead($value)
 * @method static Builder|Comment whereParentId($value)
 * @method static Builder|Comment whereStatus($value)
 * @method static Builder|Comment whereUpdatedAt($value)
 * @method static Builder|Comment whereUserId($value)
 * @method static Builder|Comment withTrashed()
 * @method static Builder|Comment withoutTrashed()
 * @property-read Collection<int, Comment> $childrenConfirmed
 * @property-read int|null $children_confirmed_count
 * @mixin Eloquent
 */
class Comment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }


    /**
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function childrenConfirmed(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id')->where('status', CommentStatuses::CONFIRMED);
    }

    /**
     * @return MorphTo
     */
    public function entity(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return HasMany
     */
    public function likes(): HasMany
    {
        return $this->hasMany(CommentLike::class)->whereType(CommentLikeTypes::LIKE);
    }

    /**
     * @return HasMany
     */
    public function dislikes(): HasMany
    {
        return $this->hasMany(CommentLike::class)->whereType(CommentLikeTypes::DISLIKE);
    }
}
