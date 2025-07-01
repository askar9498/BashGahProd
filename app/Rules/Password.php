<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;

class Password implements ValidationRule
{

    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        if (!preg_match('/^(?=.*?[a-z])(?=.*?[0-9]).{8,}$/', $value)) {
            $fail(trans('validation.passwordRegex'));
        }
    }
}