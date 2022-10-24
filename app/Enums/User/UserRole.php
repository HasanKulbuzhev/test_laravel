<?php

namespace App\Enums\User;

use App\Enums\Enum;

class UserRole extends Enum
{
    public const ADMIN = 0;
    public const PROJECT = 1;
    public const SUPPORT = 2;
}
