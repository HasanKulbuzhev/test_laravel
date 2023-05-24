<?php

namespace App\Enums;

enum RoomType
{
    const HALLWAY = 0;
    const KITCHEN = 1;
    const LIVING = 2;
    const BATH = 3;
    const BEDROOM = 4;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}