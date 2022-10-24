<?php

namespace App\Enums\Question;

use App\Enums\Enum;

abstract class Status extends Enum
{
    public const ACTIVE = 0;
    public const RESOLVED = 1;
}
