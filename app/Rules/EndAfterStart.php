<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;

class EndAfterStart implements ValidationRule
{

    protected string $startTime;

    /**
     * Create a new rule instance.
     *
     * @param  string  $startTime
     * @return void
     */
    public function __construct(string $startTime)
    {
        $this->startTime = $startTime;
    }
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        if (strtotime($value) <= strtotime($this->startTime)) {
            $fail('زمان پایان باید بعد از زمان شروع باشد');
        }
    }
}