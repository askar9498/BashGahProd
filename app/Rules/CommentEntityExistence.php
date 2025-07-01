<?php

namespace App\Rules;

use App\Enums\CommentEntities;

class CommentEntityExistence implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public string $entity_type = '';

    public function __construct($entity_type)
    {
        //
        $this->entity_type = $entity_type;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $classname = CommentEntities::EntityClasses[$this->entity_type];
        $comment = new $classname();

        return $comment->where('id', $value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return __('comment.entity.not_found');
    }
}
