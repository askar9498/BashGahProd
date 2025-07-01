<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Carbon;
use Str;


/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property int $type
 * @property string|null $slug
 * @property string $description
 * @property string $body
 * @property int $status
 * @property string $user_id
 * @property int $category_id
 * @property int|null $featured_image_id
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property string|null $tags
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, File> $attachments
 * @property-read int|null $attachments_count
 * @property-read Category $category
 * @property-read File|null $image
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post query()
 * @method static Builder|Post whereBody($value)
 * @method static Builder|Post whereCategoryId($value)
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereDeletedAt($value)
 * @method static Builder|Post whereDescription($value)
 * @method static Builder|Post whereFeaturedImageId($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post whereMetaDescription($value)
 * @method static Builder|Post whereMetaKeywords($value)
 * @method static Builder|Post whereSlug($value)
 * @method static Builder|Post whereStatus($value)
 * @method static Builder|Post whereTags($value)
 * @method static Builder|Post whereTitle($value)
 * @method static Builder|Post whereType($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @method static Builder|Post whereUserId($value)
 * @mixin Eloquent
 */
class Post extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function attachments(): MorphMany
    {
        return $this->morphMany(File::class, 'form');
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(File::class, 'featured_image_id');
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title, '-', null);
            static::ensureUniqueSlug($post);
        });

        static::updating(function ($post) {
            $post->slug = Str::slug($post->title, '-', null);
            static::ensureUniqueSlug($post);
        });
    }

    /**
     * @param $post
     * @return void
     */
    protected static function ensureUniqueSlug($post): void
    {
        $originalSlug = $slug = $post->slug;
        $counter = 1;

        while (static::query()->where('slug', $slug)->where('id', '<>', $post->id)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $post->slug = $slug;
    }
}
