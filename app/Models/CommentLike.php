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
 * @property int $user_id
 * @property int $comment_id
 * @property int $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Comment|null $comment
 * @method static Builder|CommentLike newModelQuery()
 * @method static Builder|CommentLike newQuery()
 * @method static Builder|CommentLike query()
 * @method static Builder|CommentLike whereCommentId($value)
 * @method static Builder|CommentLike whereCreatedAt($value)
 * @method static Builder|CommentLike whereId($value)
 * @method static Builder|CommentLike whereType($value)
 * @method static Builder|CommentLike whereUpdatedAt($value)
 * @method static Builder|CommentLike whereUserId($value)
 * @mixin Eloquent
 */
class CommentLike extends Model
{
    use HasFactory;

    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

}
