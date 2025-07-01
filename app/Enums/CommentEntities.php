<?php

namespace App\Enums;

use App\Models\Post;

class CommentEntities extends Enum
{
    const EntityClasses = [
        'post' => Post::class,
        'unknown' => null,
    ];

    public static function validation(): string
    {
        return 'in:' . implode(',', array_keys(self::EntityClasses));
    }
}
