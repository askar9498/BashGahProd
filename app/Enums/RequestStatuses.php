<?php

namespace App\Enums;

class RequestStatuses extends Enum
{
    const REQUESTED = 1;
    const CHECKING = 2;
    const REJECTED = 3;
    const CONFIRMED = 4;
}
